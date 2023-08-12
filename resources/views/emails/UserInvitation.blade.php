<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ config('app.name') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        .bg {
            background: #e5e7eb;
            font-family: 'Titillium Web', sans-serif;
        }

        .h-text {
            display: flex;
            color: rgba(245, 255, 255, 1);
            background: rgba(13, 150, 255, 1);
            padding: 8px;
            margin: 0;
            text-align: center;
            justify-content: center;
        }

        .h-body {
            text-align: center;
            color: rgba(36, 150, 255, 1);
        }

        .hr {
            padding: 2px;
            background: rgba(176, 206, 250, 1);
            border: none;
            border-radius: 10px;
        }

        .msg {
            padding: 2px;
            margin-left: 5rem;
            margin-right: 5rem;
            text-align: justify;
        }

        .footer {
            margin-top: 1rem;
            width: 100%;
            display: flex;
            margin-left: 8rem;
            margin-right: 8rem;
        }

        .footer .contact a {

            text-decoration: none;
            color: rgba(36, 110, 255, 1);
            display: flex;
            align-items: center;
            margin-botton: 10px
        }

        .footer .contact a:hover {
            color: rgba(36, 125, 245, 1);
            font-weight: bold;
        }

        .footer .contact a svg {
            height: 24px;
            width: 24px;
        }

        .footer .contact a span {
            padding-bottom: 8px;
            padding-left: 8px;
        }

        .otp {
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 24px;
            font-weight: bold;
            border-radius: 20px;
            background: rgba(255, 255, 255, 1);
            text-align: center;
        }
    </style>
</head>

<body class="bg">
<h1 class="h-text">{{ $mailData['title'] }}</h1>
<p class="h-body">{{ $mailData['body'] }}</p>
<hr class="hr"/>

<div class="msg">
    Hello Dear {{ $mailData['name'] }} ,
    <p>Greetings from Retrieval IT
    <p/>

    <p>
        We are happy to notify you that you have been invited to join Retrieval IT. The email contains a link to
        create an account at
        <a href="https://retrievalit.xyz/verify-admin"> https://retrievalit.xyz/verify-admin</a>.
        Throughout the verification process, you must input an OPT.
    </p>
    <p class="otp">
        {{ $mailData['otp'] }}
    </p>
    Your OTP will expire in the next 24 hours.
    <p>I appreciate you.</p>
</div>

<hr class="hr"/>
<div class="footer">
    <div class="contact">
        <a href="https://retrievalit.xyz" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M12 21a9.004 9.004 0 008.716-6.747M12 21a9.004 9.004 0 01-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 017.843 4.582M12 3a8.997 8.997 0 00-7.843 4.582m15.686 0A11.953 11.953 0 0112 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0121 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0112 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 013 12c0-1.605.42-3.113 1.157-4.418"/>
            </svg>
            <span>www.retrievalit.xyz</span>
        </a>
        <a href="tel:+8801842055800" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M10.5 1.5H8.25A2.25 2.25 0 006 3.75v16.5a2.25 2.25 0 002.25 2.25h7.5A2.25 2.25 0 0018 20.25V3.75a2.25 2.25 0 00-2.25-2.25H13.5m-3 0V3h3V1.5m-3 0h3m-3 18.75h3"/>
            </svg>
            <span>+8801842055800</span>

        </a>
        <a href="mailto:hello@retrievalit.xyz" target="_blank">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      d="M16.5 12a4.5 4.5 0 11-9 0 4.5 4.5 0 019 0zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 10-2.636 6.364M16.5 12V8.25"/>
            </svg>
            <span>hello@retrievalit.xyz</span>

        </a>
        <a>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                 stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round"
                      d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
            </svg>
            <span>1344/1, poniout, Brahmanbaria Sadar, Brahmanbaria-3400, Bangladesh</span>
        </a>
    </div>
    <div class="company">
        <img src="https://res.cloudinary.com/retrieval-it/image/upload/v1670793901/retrieval%20it%20creadit/logo.png"
             role="presentation" width="150px">
        <div style="display:flex; flex-direction:row; justify-content:center">
            <a href="https://facebook.com/retrievalit.bd" color="#287EFF">
                <img src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/facebook-icon-2x.png"
                     alt="facebook" color="#287EFF" height="24"
                     style="background-color: rgb(40, 126, 255);"></a>

            <a href="https://twitter.com/ItRetrieval" color="#287EFF">
                <img src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/twitter-icon-2x.png"
                     alt="twitter" color="#287EFF" height="24"
                     style="background-color: rgb(40, 126, 255);"></a>
            <a href="https://linkedin.com/in/retrievalit-bd/" color="#287EFF">
                <img src="https://cdn2.hubspot.net/hubfs/53/tools/email-signature-generator/icons/linkedin-icon-2x.png"
                     alt="linkedin" color="#287EFF" height="24"
                     style="background-color: rgb(40, 126, 255);"></a>
        </div>
    </div>


</div>
<hr class="hr"/>

<div>
        <span style="font-weight:300; font-size:16px">
                            The content of this email is confidential and intended for the recipient specified in message only. It is strictly forbidden to share any part of this message with any third party, without a written consent of the sender. If you received this message by mistake, please reply to this message and follow with its deletion, so that we can ensure such a mistake does not occur in the future.
                        </span>
</div>
</body>

</html>
