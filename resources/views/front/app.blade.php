<!DOCTYPE html>
<html lang="en">

@php
    $website = \App\Models\SettingWebsite::first();
@endphp

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>{{ $website->name }} | {{ $title ?? '' }}</title>


    @yield('seo')

    <!-- Favicons-->
    <link rel="shortcut icon" href="{{ Storage::url('images/setting/' . $website->favicon) }}" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="{{ Storage::url('images/setting/' . $website->favicon) }}">

    <!-- GOOGLE WEB FONT -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- BASE CSS -->
    {{-- <link href="{{ asset('front/css/bootstrap.custom.min.css') }}" rel="stylesheet"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link href="{{ asset('front/css/style.css') }}" rel="stylesheet">

    @yield('styles')

    <!-- COMMON SCRIPTS -->
    <link href="{{ asset('front/css/account.css') }}" rel="stylesheet">

    <!-- YOUR CUSTOM CSS -->
    <link href="{{ asset('front/css/custom.css') }}" rel="stylesheet">

    <!-- Include stylesheet -->
    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet" />

    <style>
        /* Style untuk pop-up chat bot */
        .chat-popup {
            display: none;
            z-index: -100;
            position: fixed;
            bottom: 98px;
            right: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            width: 350px;
            height: 400px;
            /* Tinggi tetap */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            background-color: white;
            display: flex;
            flex-direction: column;
        }

        .chat-popup-header {
            background-color: #007bff;
            color: white;
            padding: 10px;
            text-align: center;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .chat-popup-body {
            padding: 10px;
            height: 300px;
            flex: 1;
        }

        .chat-popup-footer {
            display: flex;
            padding: 10px;
            border-top: 1px solid #ddd;
        }

        .chat-popup-footer input {
            flex: 1;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .chat-popup-footer button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            margin-left: 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .message {
            margin-bottom: 15px;
            padding: 8px;
            border-radius: 10px;
            word-wrap: break-word;
        }

        .user-message {
            text-align: right;
            background-color: #007bff;
            color: white;
            margin-left: 30px;

        }

        .bot-message {
            text-align: left;
            background-color: #f1f1f1;
            margin-right: 30px;

        }
    </style>


</head>

<body>

    <div id="page">

        @include('front.partials.header')
        <!-- /header -->

        <main>
            @yield('content')
        </main>
        <!-- /main -->

        @include('front.partials.footer')
        <!--/footer-->
    </div>
    <!-- page -->

    <div id="chatBot"></div><!-- Back to top button -->
    <!-- Pop-up Chat Bot -->
    <!-- Pop-up Chat Bot -->
    <div class="chat-popup" id="chatPopup">
        <div class="chat-popup-header">
            Chat Bot
        </div>
        <div class="chat-popup-body overflow-auto" id="chatBody">
            <div class="message bot-message">Halo! Ada yang bisa saya bantu?</div>
        </div>
        <div class="chat-popup-footer">
            <input type="text" id="userInput" placeholder="Ketik pesan...">
            <button id="sendButton">Kirim</button>
        </div>
    </div>

    @if (request()->routeIs('product'))
        <div class="top_panel">
            <div class="container header_panel">
                <a href="#0" class="btn_close_top_panel"><i class="ti-close"></i></a>
                <label>1 produk Sudah Ditambah ke Keranjang</label>
            </div>
            <!-- /header_panel -->
            <div class="item">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <div class="item_panel">
                                <figure>
                                    <img src="img/products/product_placeholder_square_small.jpg"
                                        data-src="{{ Storage::url('images/product/' . $product->productImage[0]->image) }}" class="lazy" alt="">
                                </figure>
                                <h4>{{ $product->name }}</h4>
                                <div class="price_panel"><span class="new_price">@money($product->price - ($product->price * $product->discount) / 100)</span>
                                    @if ($product->discount > 0)
                                        <span class="percentage">-{{ $product->discount }}%</span> <span
                                            class="old_price">{{ $product->price }}</span>
                                    @endif
                                    </div>
                            </div>
                        </div>
                        <div class="col-md-5 btn_panel">
                            <a href="cart.html" class="btn_1 outline">View cart</a> <a href="checkout.html"
                                class="btn_1">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /item -->
        </div>
    @endif




    <!-- COMMON SCRIPTS -->
    <script src="{{ asset('front/js/common_scripts.min.js') }}"></script>
    <script src="{{ asset('front/js/main.js') }}"></script>

    @yield('scripts')

    <script>
        $("#chatBot").addClass('visible');


        $('#chatBot').on('click', function() {
            var chatPopup = document.getElementById('chatPopup');
            if (chatPopup.style.display === 'none' || chatPopup.style.display === '') {
                chatPopup.style.display = 'block';
                chatPopup.style.zIndex = '9999';
            } else {
                chatPopup.style.display = 'none';
                chatPopup.style.zIndex = '0';
            }


            $('#sendButton').on('click', function() {
                var userInput = document.getElementById('userInput');
                var message = userInput.value;
                if (message.trim() === '') return;

                appendMessage('user', message);
                userInput.value = '';

                // Simulasikan balasan bot
                setTimeout(function() {
                    var botResponse = 'Ini adalah balasan dari bot';
                    appendMessage('bot', botResponse);
                }, 1000);
            });

            function appendMessage(sender, message) {
                var chatBody = document.getElementById('chatBody');
                var messageDiv = document.createElement('div');
                messageDiv.className = 'message ' + (sender === 'user' ? 'user-message' : 'bot-message');
                messageDiv.innerText = message;
                chatBody.appendChild(messageDiv);
                chatBody.scrollTop = chatBody.scrollHeight;
            }
        });
    </script>


</body>

</html>
