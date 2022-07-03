
@extends('layouts.dashboard.master')

@section('content')

<div class="contact-content">
    <div class="container">
            <div class="contact-info">
            <h2>CONTACT</h2>
            <p><?php echo htmlspecialchars_decode ($konfigurasi->contact) ?></p>
            </div>
            <div class="contact-details">				 
            <form>
                <input type="text" placeholder="Name" required/>
                <input type="text" placeholder="Email" required/>
                <input type="text" placeholder="Phone" required/>
                <input type="text" placeholder="City Name" required/>
                <textarea placeholder="Message"></textarea>
                <input type="submit" value="SEND"/>
            </form>
         </div>
         <div class="contact-details">
             <div class="col-md-6 contact-map">
                <h4>FIND US HERE</h4>
                {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d803187.8113675824!2d-120.11910914056458!3d38.15292455846902!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808fb9fe5f285e3d%3A0x8b5109a227086f55!2sCalifornia%2C+USA!5e0!3m2!1sen!2sin!4v1423829283333" frameborder="0" style="border:0"></iframe> --}}
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3984.4524355470276!2d104.76167461446813!3d-2.971874240624829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e3b75fb21469d1f%3A0x941c3b4f42a53340!2sSynapse%20Academy!5e0!3m2!1sen!2sid!4v1656818537472!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
             {{-- <div class="col-md-6 company_address">		 
                   <h4>GET IN TOUCH</h4>
                   <p>500 Lorem Ipsum Dolor Sit,</p>
                   <p>22-56-2-9 Sit Amet, Lorem,</p>
                   <p>USA</p>
                   <p>Phone:(00) 222 666 444</p>
                   <p>Fax: (000) 123 456 78 0</p>
                   <p>Email: <a href="mailto:info@example.com">info@mycompany.com</a></p>
                   <p>Follow on: <a href="#">Facebook</a>, <a href="#">Twitter</a></p>
            </div> --}}
            <?php echo htmlspecialchars_decode ($konfigurasi->hubungikami) ?>
             <div class="clearfix"></div>
        </div>		 


            </div>
    </div>


@endsection
