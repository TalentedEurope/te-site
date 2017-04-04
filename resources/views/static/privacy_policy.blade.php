@extends('../layouts.app')

@section('page-title') Privacy policy @endsection

@section('content')
<div class="container edit-profile">
  <div class="row">
    <div class="col-md-12 col-xs-12">
      <h2 class="page-title">Privacy Policy Disclaimer – Talented Europe</h2>
      <div class="well">
        <p>This privacy policy sets out how Talented Europe uses and protects any information that you give Talented Europe when you use this website.</p>
        <p>Talented Europe is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.</p>
        <p>Talented Europe may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.<strong> This policy is effective from January 1st 2017.</strong></p>

        <h3>What we collect</h3>

        We may collect the following information:
        <ul>
          <li>For registered stakeholders: You can be part of Talented Europe community being a Student, an Educational Institution (University / Faculty /High School) or a Company.
            <ul>
              <li>Students and graduates: Personal information, academic information, training and work experience, languages, skills.</li>
              <li>Educational Institutions / Companies: Institutional information, Contacts, Addressing.</li>
            </ul>
          </li>
          <li>For the newsletters subscription: Email address for contact information.</li>
        </ul>

        <h3>What we do with the information we gather</h3>
        We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:
        <ul>
          <li>
            Internal record keeping.
          </li>
          <li>
            We may use the information to improve our searches and contacts betweenstakeholders.
          </li>
          <li>
            We may periodically send promotional emails about new issues which we think you may find interesting using the email address which you have provided.
          </li>
          <li>
            From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone or mail. We may use the information to customize the Talented Europe Applications according to your needs.
          </li>
        </ul>
        <h3>Security</h3>
        <p>We are committed to ensuring that your information is secure. In order to prevent unauthorised access or disclosure, we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.</p>

        <h3>How we use cookies</h3>
        <p>A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyse web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences.</p>

        <p>We use traffic log cookies to identify which pages are being used. This helps us analyse data about web page traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.</p>

        <p>Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.</p>

        <p>You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.</p>

        <h3>Links to other websites</h3>
        <p>Our website may contain links to other websites of interest. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.</p>

        <h3>Controlling your personal information</h3>
        <p>You may choose to restrict the collection or use of your personal information in the following ways:</p>
        <ul>
          <li>
            Whenever you are asked to fill in a form on the website you should know that the information won’t be used by anybody for direct marketing purposes. Only the registered stakeholders, as part of the community, could access to your information for possible contacts.
          </li>
          <li>
            If you have registered Talented Europe and you want your information to be removed from the platform, you may change your mind at any time by writing to or emailing us at {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}
          </li>
          <li>
            The same way, if you have subscribed Talented Europe’s newsletter and you want to stop receiving emails, you may change your mind at any time by writing to or emailing us at {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}.
          </li>
        </ul>
        <p>
          We will not distribute or lease your personal information to third parties unless we are required by law to do so. We may use your personal information to send you promotional information about new issues and news from Talented Europe.
          If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible, at {{ env('PUBLIC_MAIL_ADDRESS', 'stakeholders@talentedeurope.org') }}. We will promptly correct any information found to be incorrect.
        </p>
      </div>
    </div>
  </div>
</div>
@endsection
