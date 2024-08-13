<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Contact;
use App\Product;
use App\Category;
use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Http\Controllers\Customer\Auth\Traits\RedirectsUsersTrait;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use RedirectsUsersTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */

    // protected $redirectTo = '/cliente';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function showRegistrationForm()
    {
        // LISTAGEM DOS PRODUTOS PARA MENU TOPO
        $productsMenu = Category::with('products')
            ->whereExists(function($query){
                $query->select(Product::raw('id'))
                    ->from('products')
                    ->whereRaw('products.category_id = categories.id');
            })->where([
                ['active', '=', 1],
            ])->limit(3)->get();

        return view('site.auth.cadastro',[
            'productsMenu' => $productsMenu,
            'contacts' => Contact::first()
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {

        $chars = ['-','.','(', ')', ' '];
        $data['cpf'] = str_replace($chars,'',$data['cpf']);
        $data['phone'] = str_replace($chars,'',$data['phone']);

        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:customers'],
            'phone' => ['required', 'string', 'min:10', 'max:11'],
            'cpf' => ['required', 'string', 'min:11','max:11','unique:customers'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ],[
            'email.unique'=>'E-mail já cadastrado',
            'phone'=>'O campo de telefone é obrigatório',
            'phone.min'=>'Número de telefone inválido',
            'phone.max'=>'Número de telefone inválido',
            'cpf.unique'=>'Cpf já cadastrado',
            'password.min' => 'Mínimo de 8 caracteres',
            'password.confirmed' => 'As senhas não coincidem',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        // dd(Session::all());

        $chars = ['-','.','(', ')', ' '];
        $data['cpf'] = str_replace($chars,'',$data['cpf']);
        $data['phone'] = str_replace($chars,'',$data['phone']);

        $customerCreate = Customer::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'cpf' => $data['cpf'],
            'phone' => $data['phone'],
            'active' => 1,
            'password' => Hash::make($data['password'])
        ]);

        $customer = Customer::find($customerCreate->id);

        $customer->email_verified_at = date('Y-m-d H:i:s');
        if($customer->save()){
            Auth::guard('customer')->login($customer);
        }

        return $customerCreate;

    }
}
