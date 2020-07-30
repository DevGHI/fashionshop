@extends('user.layout.master')

@section('title')
    FashionShop | Contact
@endsection

@section('content')
<div class="contact-area d-flex align-items-center">

    <div class="google-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.566314821422!2d96.14736171449546!3d16.79823882395072!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb5e363aab97%3A0x55f0542aad97d8c7!2sShwedagon%20Pagoda%2C%20Yangon!5e0!3m2!1sen!2smm!4v1588592095158!5m2!1sen!2smm" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
    </div>

    <div class="contact-info">
        <h2>How to Find Us</h2>
        <p>Nice to meet you!! You can view everything you want from our shop , Fashionista.</p>

        <div class="contact-address mt-50">
            <p><span>address:</span> 21,Innyar Street, Yangon</p>
            <p><span>telephone:</span> +959421008929</p>
            <p><a href="mailto:contact@fashionista.com">contact@fashionista.com</a></p>
        </div>
    </div>

</div>
@endsection