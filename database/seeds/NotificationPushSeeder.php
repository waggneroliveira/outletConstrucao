<?php

use App\NotificationPush;
use Illuminate\Database\Seeder;

class NotificationPushSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NotificationPush::create([
            'title' => 'Suas Notificações',
            'menssage' => 'Essa é a sua área de notificações, todos os novos pedidos e novos status de pagamento chegarão aqui.'
        ]);
    }
}
