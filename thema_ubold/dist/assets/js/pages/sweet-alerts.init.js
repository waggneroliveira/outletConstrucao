!function (t) {
    "use strict";
    var n = function () {
    };
    n.prototype.init = function () {
        t("#sa-basic").on("click", function () {
            swal({title: "Any fool can use a computer!", confirmButtonClass: "btn btn-confirm mt-2"}).catch(swal.noop)
        }), t("#sa-title").click(function () {
            swal({
                title: "The Internet?",
                text: "That thing is still around?",
                type: "question",
                confirmButtonClass: "btn btn-confirm mt-2"
            })
        }), t("#sa-success").click(function () {
            swal({
                title: "Good job!",
                text: "You clicked the button!",
                type: "success",
                confirmButtonClass: "btn btn-confirm mt-2"
            })
        }), t("#sa-warning").click(function () {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonClass: "btn btn-confirm mt-2",
                cancelButtonClass: "btn btn-cancel ml-2 mt-2",
                confirmButtonText: "Yes, delete it!"
            }).then(function () {
                swal({
                    title: "Deleted !",
                    text: "Your file has been deleted",
                    type: "success",
                    confirmButtonClass: "btn btn-confirm mt-2"
                })
            })
        }), t("#sa-params").click(function () {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                showCancelButton: !0,
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel!",
                confirmButtonClass: "btn btn-success mt-2",
                cancelButtonClass: "btn btn-danger ml-2 mt-2",
                buttonsStyling: !1
            }).then(function () {
                swal({
                    title: "Deleted !",
                    text: "Your file has been deleted",
                    type: "success",
                    confirmButtonClass: "btn btn-confirm mt-2"
                })
            })
        }), t("#sa-image").click(function () {
            swal({
                title: "UBold",
                text: "Responsive Bootstrap 4 Admin Dashboard",
                imageUrl: "assets/images/logo-sm.png",
                imageHeight: 50,
                animation: !1,
                confirmButtonClass: "btn btn-confirm mt-2"
            })
        }), t("#sa-close").click(function () {
            swal({
                title: "Auto close alert!",
                text: "I will close in 2 seconds.",
                timer: 2e3,
                confirmButtonClass: "btn btn-confirm mt-2"
            }).then(function () {
            }, function (t) {
                "timer" === t && console.log("I was closed by the timer")
            })
        }), t("#custom-html-alert").click(function () {
            swal({
                title: "<i>HTML</i> <u>example</u>",
                type: "info",
                html: 'You can use <b>bold text</b>, <a href="//coderthemes.com/">links</a> and other HTML tags',
                showCloseButton: !0,
                showCancelButton: !0,
                confirmButtonClass: "btn btn-confirm mt-2",
                cancelButtonClass: "btn btn-cancel ml-2 mt-2",
                confirmButtonText: '<i class="mdi mdi-thumb-up-outline"></i> Great!',
                cancelButtonText: '<i class="mdi mdi-thumb-down-outline"></i>'
            })
        }), t("#custom-padding-width-alert").click(function () {
            swal({
                title: "Custom width, padding, background.",
                width: 600,
                padding: 100,
                confirmButtonClass: "btn btn-confirm mt-2",
                background: "#fff url(//subtlepatterns2015.subtlepatterns.netdna-cdn.com/patterns/geometry.png)"
            })
        }), t("#ajax-alert").click(function () {
            swal({
                title: "Submit email to run ajax request",
                input: "email",
                showCancelButton: !0,
                confirmButtonText: "Submit",
                showLoaderOnConfirm: !0,
                confirmButtonClass: "btn btn-confirm mt-2",
                cancelButtonClass: "btn btn-cancel ml-2 mt-2",
                preConfirm: function (t) {
                    return new Promise(function (n, e) {
                        setTimeout(function () {
                            "taken@example.com" === t ? e("This email is already taken.") : n()
                        }, 2e3)
                    })
                },
                allowOutsideClick: !1
            }).then(function (t) {
                swal({
                    type: "success",
                    title: "Ajax request finished!",
                    html: "Submitted email: " + t,
                    confirmButtonClass: "btn btn-confirm mt-2"
                })
            })
        }), t("#chaining-alert").click(function () {
            swal.setDefaults({
                input: "text",
                confirmButtonText: "Next &rarr;",
                showCancelButton: !0,
                animation: !1,
                progressSteps: ["1", "2", "3"],
                confirmButtonClass: "btn btn-confirm mt-2",
                cancelButtonClass: "btn btn-cancel ml-2 mt-2"
            });
            swal.queue([{
                title: "Question 1",
                text: "Chaining swal2 modals is easy"
            }, "Question 2", "Question 3"]).then(function (t) {
                swal.resetDefaults(), swal({
                    title: "All done!",
                    confirmButtonClass: "btn btn-confirm mt-2",
                    html: "Your answers: <pre>" + JSON.stringify(t) + "</pre>",
                    confirmButtonText: "Lovely!",
                    showCancelButton: !1
                })
            }, function () {
                swal.resetDefaults()
            })
        }), t("#dynamic-alert").click(function () {
            swal.queue([{
                title: "Your public IP",
                confirmButtonText: "Show my public IP",
                confirmButtonClass: "btn btn-confirm mt-2",
                text: "Your public IP will be received via AJAX request",
                showLoaderOnConfirm: !0,
                preConfirm: function () {
                    return new Promise(function (n) {
                        t.get("https://api.ipify.org?format=json").done(function (t) {
                            swal.insertQueueStep(t.ip), n()
                        })
                    })
                }
            }])
        })
    }, t.SweetAlert = new n, t.SweetAlert.Constructor = n
}(window.jQuery), function (t) {
    "use strict";
    t.SweetAlert.init()
}(window.jQuery);
