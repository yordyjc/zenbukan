{!! Html::script("assets/js/jquery-3.2.1.min.js") !!}
{!! Html::script("assets/js/Popper.js") !!}
{!! Html::script("assets/js/bootstrap.min.js") !!}
{!! Html::script("assets/js/owl.carousel.min.js") !!}
{{-- {!! Html::script("assets/js/jquery.ajaxchimp.min.js") !!} --}}
{!! Html::script("assets/js/jquery.magnific-popup.min.js") !!}
{!! Html::script("assets/js/plugins.js") !!}
{!! Html::script("assets/js/comparison.js") !!}
{!! Html::script("assets/js/jquery.waypoints.min.js") !!}
{!! Html::script("assets/js/menu.js") !!}
{!! Html::script("assets/js/nav-tool.js") !!}
<script src="https://maps.googleapis.com/maps/api/js?v=3&amp;key=AIzaSyBOQMDDOsJA0uHTqXTDHUogDJfaTST7hNQ"></script>
{!! Html::script("assets/js/scrollax.js") !!}
{!! Html::script("assets/js/TweenMax.min.js") !!}
{!! Html::script("assets/js/parallaxie.js") !!}
{!! Html::script("assets/js/vivus.min.js") !!}
{!! Html::script("assets/js/main.js") !!}

<script type="text/javascript">
    function sendRequest(url,data,method,cb) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        opts={};
        opts.url=url;
        if (data) opts.data=data;
        opts.method=method;
        opts.complete=cb;
        $.ajax(opts);
    }
</script>

<script>
    $(document).ready(function() {
        $("#form-subscribe").submit(function(e) {
            $("#submit-subscribe").html("Enviando...");
            $("#submit-subscribe").addClass("disabled");
            var formData=$(this).serialize();
            var route='/suscribirse';
            sendRequest(route,formData,'POST',function (data,textStatus) {
                $("#form-subscribe")[0].reset();
                $("#submit-subscribe").html('SUSCRIBIRSE');
                if (data.status==200) {
                    $(".sendmessage-subscribe").addClass("show");
                    $(".sendmessage-subscribe").html("Su mensaje se envió correctamente, pronto nos pondremos en contacto con Usted");
                }
                else{
                    $(".errormessage-subscribe").addClass("show");
                    $(".errormessage-subscribe").html("¡Error! Por favor, intente nuevamente");
                }
            })
            e.preventDefault();
            return false;
        });
    });
</script>

@yield('js')
