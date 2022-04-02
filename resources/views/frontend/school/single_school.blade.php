@extends('frontend.layouts.app')

@section('title', 'Proxima Study | School: '.$school->name)

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')

    <div class="container mt-5 single-school">

        <div class="row">
            <div class="col-12 col-md-3" style="padding-top: 4rem;">
                <h6 class="fw-bold related-articles futura mb-4">Related articles</h6>
                
                <div class="row align-items-center">

                    @foreach($articles as $key => $article)

                        <div class="col-12 mb-3">
                            <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                <div class="card border-0">
                                    @if($article->image != null)
                                        <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @else
                                        <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                    @endif
                                    <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                        <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
                

                <h4 class="fw-bold futura mt-5 p-3 text-center" style="background-color: #dbdbdb;">Master application</h4>

                <div class="card p-3 master-application rounded-0" style="background-color: #f0f0f0">

                    <form action="{{ route('frontend.master_application_store') }}" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12">
                                <p class="mb-2 required fw-bold text-end">* Indicates required fields</p>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="first-name" class="form-label">First name *</label>
                                <input type="text" class="form-control" id="first-name" name="first_name" required>
                            </div>

                            <!-- <div class="form-group">
                                <input class="date form-control" type="text">
                            </div> -->

                            <div class="col-12 mb-3">
                                <label for="last-name" class="form-label">Last name *</label>
                                <input type="text" class="form-control" id="last-name" name="last_name" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="dob" class="form-label">Date of birth *</label>
                                <!-- <input type="text" class="form-control" id="dob" name="dob" placeholder="YYYY-MM-DD" readonly="readonly"  maxlength="10"  autocomplete="off" required> -->
                                <input type="date" class="dob" name="dob" required>
                                <!-- <input id="birthday" class="form-control" name="birthday" autocomplete="off" readonly="readonly" type="text" placeholder="YYYY-MM-DD" maxlength="10"> -->
                            </div>

                            <div class="col-12 mb-3">
                                <label for="gender" class="form-label">Gender *</label>
                                <select name="gender" id="gender" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                    <option value="Not to say">Prefer not to say</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="email" class="form-label">Email address *</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="confirm-email" class="form-label">Confirm email address *</label>
                                <input type="email" class="form-control" id="confirm-email" name="confirm_email" required>
                                <p class="d-none mt-2 text-center fw-bold email-warning" style="color: red;">Emails do not match</p>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="phone" class="form-label">Phone number *</label>
                                <input type="text" class="form-control" id="phone" name="phone" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="school-text" class="form-label">Can schools text you *</label>
                                <select name="school_text" id="school-text" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Allow">Allow</option>
                                    <option value="Do not Allow">Do not Allow</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="messaging-app" class="form-label">Messaging app</label>
                                <div class="dropdown">
                                    <button class="form-select form-control text-left" type="button" id="messaging-app" data-bs-toggle="dropdown">Select</button>
                                    
                                    <div class="dropdown-menu" style="width: 100%;">
                                        <div class="row px-2">
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Facebook Messenger" id="facebook-messenger">
                                                <label class="form-check-label" for="facebook-messenger">Facebook Messenger</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Google Chat" id="google-chat">
                                                <label class="form-check-label" for="google-chat">Google Chat</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="GroupMe" id="group-me">
                                                <label class="form-check-label" for="group-me">GroupMe</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Hike Messenger" id="hike-messenger">
                                                <label class="form-check-label" for="hike-messenger">Hike Messenger</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="iMessage" id="iMessage">
                                                <label class="form-check-label" for="iMessage">iMessage</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="LINE" id="line">
                                                <label class="form-check-label" for="line">LINE</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="QQ Messenger" id="qq-messenger">
                                                <label class="form-check-label" for="qq-messenger">QQ Messenger</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Signal" id="signal">
                                                <label class="form-check-label" for="signal">Signal</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Skype" id="skype">
                                                <label class="form-check-label" for="skype">Skype</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Snapchat" id="snapchat">
                                                <label class="form-check-label" for="snapchat">Snapchat</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="SOMA Messenger" id="soma-messenger">
                                                <label class="form-check-label" for="soma-messenger">SOMA Messenger</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Telegram" id="telegram">
                                                <label class="form-check-label" for="telegram">Telegram</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Twitter" id="twitter">
                                                <label class="form-check-label" for="twitter">Twitter</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Viber" id="viber">
                                                <label class="form-check-label" for="viber">Viber</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="WeChat" id="we-chat">
                                                <label class="form-check-label" for="we-chat">WeChat</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Whatsapp" id="whatsapp">
                                                <label class="form-check-label" for="whatsapp">Whatsapp</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Microsoft Teams" id="microsoft">
                                                <label class="form-check-label" for="microsoft">Microsoft Teams</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Google Meet" id="google-meet">
                                                <label class="form-check-label" for="google-meet">Google Meet</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" value="Zoom" id="zoom">
                                                <label class="form-check-label" for="zoom">Zoom</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="messaging_app[]" id="other" value="Other">
                                                <label class="form-check-label" for="other">Other</label>
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control" name="messaging_app[]" id="text-other" rows="3" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="username" class="form-label">Messaging app username</label>
                                <input type="text" class="form-control" id="username" name="username">
                            </div>

                            <div class="col-12 mb-3">
                                <label for="citizenship" class="form-label">Country of citizenship *</label>
                                <select name="citizenship" id="citizenship" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="citizenship-live" class="form-label">Do you live in your country of citizenship? *</label>
                                <select name="citizenship_live" id="citizenship-live" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="country" class="form-label">Where do you currently reside?</label>
                                <select class="form-control form-select " id="country" name="country">
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="status" class="form-label">Status in the country of residence</label>
                                <div class="dropdown">
                                    <button class="form-select form-control text-left" type="button" id="status" data-bs-toggle="dropdown">Select</button>
                                    
                                    <div class="dropdown-menu" style="width: 100%;">
                                        <div class="row px-2">
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="status[]" value="Parents/ relative sponsorship" id="parents-relative-sponsorship">
                                                <label class="form-check-label" for="parents-relative-sponsorship">Parents/ relative sponsor</label>
                                            </div>

                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="status[]" value="Permanent resident" id="permanent-resident">
                                                <label class="form-check-label" for="permanent-resident">Permanent resident</label>
                                            </div>

                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="status[]" value="Study/ Student visa" id="study-visa">
                                                <label class="form-check-label" for="study-visa">Study/ Student visa</label>
                                            </div>
                                            
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="status[]" value="Visit Visa" id="visit-visa">
                                                <label class="form-check-label" for="visit-visa">Visit Visa</label>
                                            </div>

                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="status[]" value="Work Visa" id="work-visa">
                                                <label class="form-check-label" for="work-visa">Work Visa</label>
                                            </div>
                                            
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="status[]" id="status-other" value="Other">
                                                <label class="form-check-label" for="status-other">Other</label>
                                            </div>

                                            <div class="col-12">
                                                <textarea class="form-control" name="status[]" id="text-status" rows="3" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="mailing-address" class="form-label">Mailing address *</label>
                                <textarea class="form-control" name="mailing_address" id="mailing-address" rows="3" placeholder="Complete with country name, postal code or ZIP code as applicable" required></textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="school-name" class="form-label">High school name *</label>
                                <input type="text" class="form-control" id="school-name" name="school_name" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="gpa" class="form-label">High school GPA *</label>
                                <input type="text" class="form-control" id="gpa" name="gpa" placeholder="e.g. (75%), or (3.4 of 4)" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="school-city" class="form-label">High school location - city *</label>
                                <input type="text" class="form-control" id="school-city" name="school_city" required>
                            </div>

                            
                            <div class="col-12 mb-3">
                                <label for="school-country" class="form-label">High school location - country *</label>
                                <select class="form-control form-select" id="school-country" name="school_country" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Afganistan">Afghanistan</option>
                                    <option value="Albania">Albania</option>
                                    <option value="Algeria">Algeria</option>
                                    <option value="American Samoa">American Samoa</option>
                                    <option value="Andorra">Andorra</option>
                                    <option value="Angola">Angola</option>
                                    <option value="Anguilla">Anguilla</option>
                                    <option value="Antigua & Barbuda">Antigua & Barbuda</option>
                                    <option value="Argentina">Argentina</option>
                                    <option value="Armenia">Armenia</option>
                                    <option value="Aruba">Aruba</option>
                                    <option value="Australia">Australia</option>
                                    <option value="Austria">Austria</option>
                                    <option value="Azerbaijan">Azerbaijan</option>
                                    <option value="Bahamas">Bahamas</option>
                                    <option value="Bahrain">Bahrain</option>
                                    <option value="Bangladesh">Bangladesh</option>
                                    <option value="Barbados">Barbados</option>
                                    <option value="Belarus">Belarus</option>
                                    <option value="Belgium">Belgium</option>
                                    <option value="Belize">Belize</option>
                                    <option value="Benin">Benin</option>
                                    <option value="Bermuda">Bermuda</option>
                                    <option value="Bhutan">Bhutan</option>
                                    <option value="Bolivia">Bolivia</option>
                                    <option value="Bonaire">Bonaire</option>
                                    <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                    <option value="Botswana">Botswana</option>
                                    <option value="Brazil">Brazil</option>
                                    <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                    <option value="Brunei">Brunei</option>
                                    <option value="Bulgaria">Bulgaria</option>
                                    <option value="Burkina Faso">Burkina Faso</option>
                                    <option value="Burundi">Burundi</option>
                                    <option value="Cambodia">Cambodia</option>
                                    <option value="Cameroon">Cameroon</option>
                                    <option value="Canada">Canada</option>
                                    <option value="Canary Islands">Canary Islands</option>
                                    <option value="Cape Verde">Cape Verde</option>
                                    <option value="Cayman Islands">Cayman Islands</option>
                                    <option value="Central African Republic">Central African Republic</option>
                                    <option value="Chad">Chad</option>
                                    <option value="Channel Islands">Channel Islands</option>
                                    <option value="Chile">Chile</option>
                                    <option value="China">China</option>
                                    <option value="Christmas Island">Christmas Island</option>
                                    <option value="Cocos Island">Cocos Island</option>
                                    <option value="Colombia">Colombia</option>
                                    <option value="Comoros">Comoros</option>
                                    <option value="Congo">Congo</option>
                                    <option value="Cook Islands">Cook Islands</option>
                                    <option value="Costa Rica">Costa Rica</option>
                                    <option value="Cote DIvoire">Cote DIvoire</option>
                                    <option value="Croatia">Croatia</option>
                                    <option value="Cuba">Cuba</option>
                                    <option value="Curaco">Curacao</option>
                                    <option value="Cyprus">Cyprus</option>
                                    <option value="Czech Republic">Czech Republic</option>
                                    <option value="Denmark">Denmark</option>
                                    <option value="Djibouti">Djibouti</option>
                                    <option value="Dominica">Dominica</option>
                                    <option value="Dominican Republic">Dominican Republic</option>
                                    <option value="East Timor">East Timor</option>
                                    <option value="Ecuador">Ecuador</option>
                                    <option value="Egypt">Egypt</option>
                                    <option value="El Salvador">El Salvador</option>
                                    <option value="Equatorial Guinea">Equatorial Guinea</option>
                                    <option value="Eritrea">Eritrea</option>
                                    <option value="Estonia">Estonia</option>
                                    <option value="Ethiopia">Ethiopia</option>
                                    <option value="Falkland Islands">Falkland Islands</option>
                                    <option value="Faroe Islands">Faroe Islands</option>
                                    <option value="Fiji">Fiji</option>
                                    <option value="Finland">Finland</option>
                                    <option value="France">France</option>
                                    <option value="French Guiana">French Guiana</option>
                                    <option value="French Polynesia">French Polynesia</option>
                                    <option value="French Southern Ter">French Southern Ter</option>
                                    <option value="Gabon">Gabon</option>
                                    <option value="Gambia">Gambia</option>
                                    <option value="Georgia">Georgia</option>
                                    <option value="Germany">Germany</option>
                                    <option value="Ghana">Ghana</option>
                                    <option value="Gibraltar">Gibraltar</option>
                                    <option value="Great Britain">Great Britain</option>
                                    <option value="Greece">Greece</option>
                                    <option value="Greenland">Greenland</option>
                                    <option value="Grenada">Grenada</option>
                                    <option value="Guadeloupe">Guadeloupe</option>
                                    <option value="Guam">Guam</option>
                                    <option value="Guatemala">Guatemala</option>
                                    <option value="Guinea">Guinea</option>
                                    <option value="Guyana">Guyana</option>
                                    <option value="Haiti">Haiti</option>
                                    <option value="Hawaii">Hawaii</option>
                                    <option value="Honduras">Honduras</option>
                                    <option value="Hong Kong">Hong Kong</option>
                                    <option value="Hungary">Hungary</option>
                                    <option value="Iceland">Iceland</option>
                                    <option value="Indonesia">Indonesia</option>
                                    <option value="India">India</option>
                                    <option value="Iran">Iran</option>
                                    <option value="Iraq">Iraq</option>
                                    <option value="Ireland">Ireland</option>
                                    <option value="Isle of Man">Isle of Man</option>
                                    <option value="Israel">Israel</option>
                                    <option value="Italy">Italy</option>
                                    <option value="Jamaica">Jamaica</option>
                                    <option value="Japan">Japan</option>
                                    <option value="Jordan">Jordan</option>
                                    <option value="Kazakhstan">Kazakhstan</option>
                                    <option value="Kenya">Kenya</option>
                                    <option value="Kiribati">Kiribati</option>
                                    <option value="Korea North">Korea North</option>
                                    <option value="Korea Sout">Korea South</option>
                                    <option value="Kuwait">Kuwait</option>
                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                    <option value="Laos">Laos</option>
                                    <option value="Latvia">Latvia</option>
                                    <option value="Lebanon">Lebanon</option>
                                    <option value="Lesotho">Lesotho</option>
                                    <option value="Liberia">Liberia</option>
                                    <option value="Libya">Libya</option>
                                    <option value="Liechtenstein">Liechtenstein</option>
                                    <option value="Lithuania">Lithuania</option>
                                    <option value="Luxembourg">Luxembourg</option>
                                    <option value="Macau">Macau</option>
                                    <option value="Macedonia">Macedonia</option>
                                    <option value="Madagascar">Madagascar</option>
                                    <option value="Malaysia">Malaysia</option>
                                    <option value="Malawi">Malawi</option>
                                    <option value="Maldives">Maldives</option>
                                    <option value="Mali">Mali</option>
                                    <option value="Malta">Malta</option>
                                    <option value="Marshall Islands">Marshall Islands</option>
                                    <option value="Martinique">Martinique</option>
                                    <option value="Mauritania">Mauritania</option>
                                    <option value="Mauritius">Mauritius</option>
                                    <option value="Mayotte">Mayotte</option>
                                    <option value="Mexico">Mexico</option>
                                    <option value="Midway Islands">Midway Islands</option>
                                    <option value="Moldova">Moldova</option>
                                    <option value="Monaco">Monaco</option>
                                    <option value="Mongolia">Mongolia</option>
                                    <option value="Montserrat">Montserrat</option>
                                    <option value="Morocco">Morocco</option>
                                    <option value="Mozambique">Mozambique</option>
                                    <option value="Myanmar">Myanmar</option>
                                    <option value="Nambia">Nambia</option>
                                    <option value="Nauru">Nauru</option>
                                    <option value="Nepal">Nepal</option>
                                    <option value="Netherland Antilles">Netherland Antilles</option>
                                    <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                    <option value="Nevis">Nevis</option>
                                    <option value="New Caledonia">New Caledonia</option>
                                    <option value="New Zealand">New Zealand</option>
                                    <option value="Nicaragua">Nicaragua</option>
                                    <option value="Niger">Niger</option>
                                    <option value="Nigeria">Nigeria</option>
                                    <option value="Niue">Niue</option>
                                    <option value="Norfolk Island">Norfolk Island</option>
                                    <option value="Norway">Norway</option>
                                    <option value="Oman">Oman</option>
                                    <option value="Pakistan">Pakistan</option>
                                    <option value="Palau Island">Palau Island</option>
                                    <option value="Palestine">Palestine</option>
                                    <option value="Panama">Panama</option>
                                    <option value="Papua New Guinea">Papua New Guinea</option>
                                    <option value="Paraguay">Paraguay</option>
                                    <option value="Peru">Peru</option>
                                    <option value="Phillipines">Philippines</option>
                                    <option value="Pitcairn Island">Pitcairn Island</option>
                                    <option value="Poland">Poland</option>
                                    <option value="Portugal">Portugal</option>
                                    <option value="Puerto Rico">Puerto Rico</option>
                                    <option value="Qatar">Qatar</option>
                                    <option value="Republic of Montenegro">Republic of Montenegro</option>
                                    <option value="Republic of Serbia">Republic of Serbia</option>
                                    <option value="Reunion">Reunion</option>
                                    <option value="Romania">Romania</option>
                                    <option value="Russia">Russia</option>
                                    <option value="Rwanda">Rwanda</option>
                                    <option value="St Barthelemy">St Barthelemy</option>
                                    <option value="St Eustatius">St Eustatius</option>
                                    <option value="St Helena">St Helena</option>
                                    <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                    <option value="St Lucia">St Lucia</option>
                                    <option value="St Maarten">St Maarten</option>
                                    <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                    <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                    <option value="Saipan">Saipan</option>
                                    <option value="Samoa">Samoa</option>
                                    <option value="Samoa American">Samoa American</option>
                                    <option value="San Marino">San Marino</option>
                                    <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                    <option value="Saudi Arabia">Saudi Arabia</option>
                                    <option value="Senegal">Senegal</option>
                                    <option value="Seychelles">Seychelles</option>
                                    <option value="Sierra Leone">Sierra Leone</option>
                                    <option value="Singapore">Singapore</option>
                                    <option value="Slovakia">Slovakia</option>
                                    <option value="Slovenia">Slovenia</option>
                                    <option value="Solomon Islands">Solomon Islands</option>
                                    <option value="Somalia">Somalia</option>
                                    <option value="South Africa">South Africa</option>
                                    <option value="Spain">Spain</option>
                                    <option value="Sri Lanka">Sri Lanka</option>
                                    <option value="Sudan">Sudan</option>
                                    <option value="Suriname">Suriname</option>
                                    <option value="Swaziland">Swaziland</option>
                                    <option value="Sweden">Sweden</option>
                                    <option value="Switzerland">Switzerland</option>
                                    <option value="Syria">Syria</option>
                                    <option value="Tahiti">Tahiti</option>
                                    <option value="Taiwan">Taiwan</option>
                                    <option value="Tajikistan">Tajikistan</option>
                                    <option value="Tanzania">Tanzania</option>
                                    <option value="Thailand">Thailand</option>
                                    <option value="Togo">Togo</option>
                                    <option value="Tokelau">Tokelau</option>
                                    <option value="Tonga">Tonga</option>
                                    <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                    <option value="Tunisia">Tunisia</option>
                                    <option value="Turkey">Turkey</option>
                                    <option value="Turkmenistan">Turkmenistan</option>
                                    <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                    <option value="Tuvalu">Tuvalu</option>
                                    <option value="Uganda">Uganda</option>
                                    <option value="United Kingdom">United Kingdom</option>
                                    <option value="Ukraine">Ukraine</option>
                                    <option value="United Arab Erimates">United Arab Emirates</option>
                                    <option value="United States of America">United States of America</option>
                                    <option value="Uraguay">Uruguay</option>
                                    <option value="Uzbekistan">Uzbekistan</option>
                                    <option value="Vanuatu">Vanuatu</option>
                                    <option value="Vatican City State">Vatican City State</option>
                                    <option value="Venezuela">Venezuela</option>
                                    <option value="Vietnam">Vietnam</option>
                                    <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                    <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                    <option value="Wake Island">Wake Island</option>
                                    <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                    <option value="Yemen">Yemen</option>
                                    <option value="Zaire">Zaire</option>
                                    <option value="Zambia">Zambia</option>
                                    <option value="Zimbabwe">Zimbabwe</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="start-date" class="form-label">When are you planning to start *</label>
                                <select name="start_date" id="start-date" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="I am not sure">I am not sure</option>
                                    <option value="Winter of this year">Winter of this year</option>
                                    <option value="Summer of this year">Summer of this year</option>
                                    <option value="Fall of this year">Fall of this year</option>
                                    <option value="Winter of next year">Winter of next year</option>
                                    <option value="Summer of next year">Summer of next year</option>
                                    <option value="Fall of next year">Fall of next year</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="interested" class="form-label">I am interested in *</label>
                                <select name="interested" id="interested" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="I am not sure">I am not sure</option>
                                    @foreach($data as $da)
                                        <option value="{{ $da->id }}">{{ $da->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="like-study" class="form-label">I would like to study *</label>
                                <select name="like_study" id="like-study" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    @foreach($prog as $pro)
                                        <option value="{{ $pro->id }}">{{ $pro->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="student-type" class="form-label">My student type is *</label>
                                <select name="student_type" id="student-type" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Exchange student">Exchange student</option>
                                    <option value="New/ Freshman">New/ Freshman</option>
                                    <option value="Returning student">Returning student</option>
                                    <option value="Student with disabilities">Student with disabilities</option>
                                    <option value="Transfer student">Transfer student</option>
                                </select>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="funding-source" class="form-label">Tuition funding source</label>
                                <div class="dropdown">
                                    <button class="form-select form-control text-left" type="button" id="funding-source" data-bs-toggle="dropdown">Select</button>
                                    
                                    <div class="dropdown-menu" style="width: 100%;">
                                        <div class="row px-2">
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="funding_source[]" value="My own funds" id="my-own-funds">
                                                <label class="form-check-label" for="my-own-funds">My own funds</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="funding_source[]" value="Parents, family, relative(s), friend(s)" id="family">
                                                <label class="form-check-label" for="family" style="display: inline">Parents, family, relative(s), friend(s)</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="funding_source[]" value="Sponsored by company or government" id="company-government">
                                                <label class="form-check-label" for="company-government" style="display: inline">Sponsored by company or government</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="funding_source[]" value="Sponsored by NGO" id="ngo">
                                                <label class="form-check-label" for="ngo">Sponsored by NGO</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" name="funding_source[]" value="Sponsored by not-for-profit organization" id="organization">
                                                <label class="form-check-label" for="organization" style="display: inline">Sponsored by not-for-profit organization</label>
                                            </div>
                                            <div class="col-12 mb-1">
                                                <input type="checkbox" class="me-1" id="funding-source-other" value="Other">
                                                <label class="form-check-label" for="funding-source-other">Other</label>
                                            </div>
                                            <div class="col-12">
                                                <textarea class="form-control" name="funding_source[]" id="funding-source-status" rows="3" disabled></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="tests" class="form-label">Tests taken</label>
                                <div class="dropdown">
                                    <button class="form-select form-control text-left" type="button" id="tests" data-bs-toggle="dropdown">Select</button>
                                    
                                    <div class="dropdown-menu tests-menu" style="width: 100%;">

                                        <div class="row px-2 mb-2">
                                            <div class="col-7 text-center">
                                                <label class="form-label mb-0">Test name</label>
                                            </div>
                                            <div class="col-5 text-center">
                                                <label class="form-label mb-0">Score</label>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="ACT" id="act">
                                                    <label class="form-check-label" for="act">ACT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="DAT" id="dat">
                                                    <label class="form-check-label" for="dat">DAT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="ESL" id="esl">
                                                    <label class="form-check-label" for="esl">ESL</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="GMAT" id="gmat">
                                                    <label class="form-check-label" for="gmat">GMAT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="GRE" id="gre">
                                                    <label class="form-check-label" for="gre">GRE</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="IELTS" id="ielts">
                                                    <label class="form-check-label" for="ielts">IELTS</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="LSAT" id="lsat">
                                                    <label class="form-check-label" for="lsat">LSAT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="MCAT" id="mcat">
                                                    <label class="form-check-label" for="mcat">MCAT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="OAT" id="oat">
                                                    <label class="form-check-label" for="oat">OAT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="PCAT" id="pcat">
                                                    <label class="form-check-label" for="pcat">PCAT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="SAT" id="sat">
                                                    <label class="form-check-label" for="sat">SAT</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="border">
                                                    <input type="checkbox" class="me-2 test-box" name="tests[]" value="TOEFL" id="toefl">
                                                    <label class="form-check-label" for="toefl">TOEFL</label>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 40px;">
                                                        <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                                    </div>
                                                    <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-1: Please type" id="other1" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 40px;">
                                                        <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                                    </div>
                                                    <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-2: Please type" id="other2" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 40px;">
                                                        <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                                    </div>
                                                    <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-3: Please type" id="other3" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 40px;">
                                                        <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                                    </div>
                                                    <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-4: Please type" id="other4" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                            </div>
                                        </div>

                                        <div class="row px-2 align-items-center mb-2">
                                            <div class="col-7 test">
                                                <div class="input-group">
                                                    <div class="input-group-text" style="width: 40px;">
                                                        <input class="form-check-input mt-0 ms-0 more-test-check" type="checkbox">
                                                    </div>
                                                    <input type="text" class="form-control more-test" name="tests[]" placeholder="Other-5: Please type" id="other5" disabled required>
                                                </div>
                                            </div>
                                            <div class="col-5 marks">
                                                <input type="number" class="form-control me-1" name="marks[]" disabled required>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="comments" class="form-label">Additional comments/ inquiries/ questions (Please write in English)</label>
                                <textarea name="comments" id="comments" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="questions" class="form-label">Do you want to add anything: questions, specific circumstances, comments, ...? (Please write in English)</label>
                                <textarea name="questions" id="questions" class="form-control" rows="4"></textarea>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="transfer-student" class="form-label">Are you a transfer student currently living in Canada? *</label>
                                <select name="transfer_student" id="transfer-student" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="col-12 mb-4">
                                <label for="visa" class="form-label">Do you already have a study permit (a student visa) from a Canadian embassy? *</label>
                                <select name="visa" id="visa" class="form-select form-control" required>
                                    <option value="" selected disabled hidden>Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>

                            <div class="col-12 form-check" style="padding-left: 2.25rem;">
                                <input class="form-check-input" type="checkbox" name="email_copy">
                                <label class="form-check-label" for="flexCheckDefault">
                                    Send me a copy
                                </label>
                            </div>


                            <div class="col-12 mt-4 mb-3 gray" style="font-size: 0.9rem">
                                <label class="form-label">By submitting this form, I agree to receiving emails about educational services from 4R Business Services, Proxima Study, and its partners according to the guidelines set out in our <a href="{{ route('frontend.privacy_policy') }}" class="text-decoration-none" target="_blank" style="color: #b1040e">Privacy policy</a>
                            </div>

                            <div class="col-12 text-center mb-3">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR" style="transform:scale(0.73);-webkit-transform:scale(0.73); transform-origin:0 0; -webkit-transform-origin:0 0;"></div>
                            </div>

                            <div class="col-12 text-center">
                                <input type="hidden" class="form-control" name="school_id" value="{{ $school->id }}">
                                <input type="hidden" class="form-control" name="school_slug" value="{{ $school->slug }}">
                                <button type="submit" class="btn btn-primary px-5 py-3 text-white w-100" id="submit_btn" disabled>Submit</button>
                            </div>

                        </div>
                    </form>
                </div>
                
            </div>

            <div class="col-12 col-md-9">
                <div class="row align-items-center">
                    <div class="col-10">
                        <h4 class="fw-bolder futura">{{ $school->name }}</h4>
                    </div>
                    @auth
                        @if(is_favorite_school( $school->id, auth()->user()->id))
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_school') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $school->id }}">
                                    <input type="hidden" name='favorite' value="favorite">
                                    <button type="submit" class="fas fa-heart favorite-heart text-decoration-none" style="vertical-align: middle;"></button>
                                </form>
                            </div>
                        @else
                            <div class="col-2 text-end">
                                <form action="{{ route('frontend.favorite_school') }}" method="POST">
                                {{csrf_field()}}
                                    <input type="hidden" name='hidden_id' value="{{ $school->id }}">
                                    <input type="hidden" name='favorite' value="non-favorite">
                                    <button type="submit" class="far fa-heart favorite-heart text-decoration-none" style="vertical-align: middle;"></button>
                                </form>
                            </div>
                        @endif
                    @else
                        <div class="col-2 text-end">
                            <a href="{{ route('frontend.auth.login') }}" class="far fa-heart favorite-heart text-decoration-none"></a>
                        </div>
                    @endauth
                </div>
                
                <hr>

                <div class="row mb-3">
                    <div class="col-9">
                        @if($school->images != null)
                            <div class="swiper mySwiper">
                                <div class="swiper-wrapper">
                                    @php
                                        $str_arr = preg_split ("/\,/", $school->images);
                                    @endphp
                                    @foreach($str_arr as $key => $image)
                                        <div class="swiper-slide">
                                            <img src="{{ uploaded_asset($image) }}" alt="" class="img-fluid w-100" style="height: 20.3rem;width: 100%; object-fit: cover;">
                                        </div>
                                    @endforeach
                                </div>
                                <div class="swiper-button-next"></div>
                                <div class="swiper-button-prev"></div>
                            </div>
                        @else
                            <img src="{{ uploaded_asset($school->featured_image) }}" alt="" class="img-fluid w-100" style="height: 20.3rem;width: 100%; object-fit: cover;">
                        @endif
                    </div>

                    <div class="col-3 ps-0 text">
                        <h6 class="fw-bold related-articles futura">{{$school->name}} Weblinks</h6>

                        <div class="row">
                            <div class="col-6 pe-0">
                                @if($school->link_1_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_1_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_1_name }}</p>
                                        </a>
                                    </div>
                                @endif

                                @if($school->link_2_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_2_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_2_name }}</p>
                                        </a>
                                    </div>
                                @endif

                                @if($school->link_3_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_3_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_3_name }}</p>
                                        </a>
                                    </div>
                                @endif

                                @if($school->link_4_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_4_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_4_name }}</p>
                                        </a>
                                    </div>
                                @endif

                                @if($school->link_5_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_5_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_5_name }}</p>
                                        </a>
                                    </div>
                                @endif

                                @if($school->link_6_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_6_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_6_name }}</p>
                                        </a>
                                    </div>
                                @endif

                                @if($school->link_7_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_7_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_7_name }}</p>
                                        </a>
                                    </div>
                                @endif

                                @if($school->link_8_name != null)
                                    <div class="border border-top-0 p-2">
                                        <a href="{{ $school->link_8_url }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold text-center" style="font-size: 0.7rem">{{ $school->link_8_name }}</p>
                                        </a>
                                    </div>
                                @endif

                            </div>

                            <div class="col-6 ps-0">
                                @if($school->facebook != null)
                                    <div class="border border-top-0 p-2">
                                        <!-- <a href="{{ $school->facebook }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold" style="font-size: 0.8rem"><i class="fab fa-facebook-f me-2 text-primary"></i>Facebook</p>
                                        </a> -->
                                        <a href="{{ $school->facebook }}" class="text-decoration-none" target="_blank">
                                            <div class="row align-items-center">
                                                <div class="col-2">
                                                    <i class="fab fa-facebook-f text-primary"></i>
                                                </div>
                                                <div class="col-8 ps-2 pe-1">
                                                    <p class="text-dark fw-bold" style="font-size: 0.7rem">Facebook</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if($school->twitter != null)
                                    <div class="border border-top-0 p-2">
                                        <!-- <a href="{{ $school->twitter }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold" style="font-size: 0.8rem"><i class="fab fa-twitter me-2 text-primary"></i>Twitter</p>
                                        </a> -->

                                        <a href="{{ $school->twitter }}" class="text-decoration-none" target="_blank">
                                            <div class="row align-items-center">
                                                <div class="col-2">
                                                    <i class="fab fa-twitter text-primary"></i>
                                                </div>
                                                <div class="col-8 ps-2 pe-1">
                                                    <p class="text-dark fw-bold" style="font-size: 0.7rem">Twitter</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if($school->instagram != null)
                                    <div class="border border-top-0 p-2">
                                        <!-- <a href="{{ $school->instagram }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold" style="font-size: 0.8rem"><i class="fab fa-instagram me-2" style="color: #E1306C;"></i>Instagram</p>
                                        </a> -->

                                        <a href="{{ $school->instagram }}" class="text-decoration-none" target="_blank">
                                            <div class="row align-items-center">
                                                <div class="col-2">
                                                    <i class="fab fa-instagram" style="color: #E1306C;"></i>
                                                </div>
                                                <div class="col-8 ps-2 pe-1">
                                                    <p class="text-dark fw-bold" style="font-size: 0.7rem">Instagram</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if($school->you_tube != null)
                                    <div class="border border-top-0 p-2">
                                        <!-- <a href="{{ $school->you_tube }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold" style="font-size: 0.8rem"><i class="fab fa-youtube me-2" style="color: red;"></i>YouTube</p>
                                        </a> -->

                                        <a href="{{ $school->you_tube }}" class="text-decoration-none" target="_blank">
                                            <div class="row align-items-center">
                                                <div class="col-2">
                                                    <i class="fab fa-youtube" style="color: red;"></i>
                                                </div>
                                                <div class="col-8 ps-2 pe-1">
                                                    <p class="text-dark fw-bold" style="font-size: 0.7rem">YouTube</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endif

                                @if($school->linked_in != null)
                                    <div class="border border-top-0 p-2">
                                        <!-- <a href="{{ $school->linked_in }}" class="text-decoration-none" target="_blank">
                                            <p class="text-dark fw-bold" style="font-size: 0.8rem"><i class="fab fa-linkedin me-2 text-primary"></i>LinkedIn</p>
                                        </a> -->

                                        <a href="{{ $school->linked_in }}" class="text-decoration-none" target="_blank">
                                            <div class="row align-items-center">
                                                <div class="col-2">
                                                    <i class="fab fa-linkedin text-primary"></i>
                                                </div>
                                                <div class="col-8 ps-2 pe-1">
                                                    <p class="text-dark fw-bold" style="font-size: 0.7rem">LinkedIn</p>
                                                </div>
                                            </div>
                                        </a>

                                        
                                    </div>
                                @endif


                                @if($school->vk != null)
                                    <div class="border border-top-0 p-2">
                                    
                                        <a href="{{ $school->vk }}" class="text-decoration-none" target="_blank">
                                            <div class="row align-items-center">
                                                <div class="col-2">
                                                    <i class="fa-brands fa-vk text-primary"></i>
                                                </div>
                                                <div class="col-8 ps-2 pe-1">
                                                    <p class="text-dark fw-bold" style="font-size: 0.7rem">VK</p>
                                                </div>
                                            </div>
                                        </a>

                                        
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-tabs justify-content-between mb-3 main-nav" id="myTab" role="tablist">
                            @if($school->quick_facts_status == 'Yes')
                                <li class="nav-item" role="presentation">
                                    <a href="#tab-quick-facts" class="nav-link active futura" id="quick-facts-tab" data-bs-toggle="tab" data-bs-target="#quick-facts" type="button" role="tab" aria-controls="quick-facts" aria-selected="true">Quick facts</a>
                                </li>
                            @endif

                            @if($school->overview_status == 'Yes')
                                <li class="nav-item" role="presentation">
                                    <a href="#tab-overview" class="nav-link futura" id="overview-tab" data-bs-toggle="tab" data-bs-target="#overview" type="button" role="tab" aria-controls="overview" aria-selected="false">Overview</a>
                                </li>
                            @endif

                            @if($school->programs_status == 'Yes')
                                <li class="nav-item" role="presentation">
                                    <a href="#tab-programs" class="nav-link futura" id="programs-tab" data-bs-toggle="tab" data-bs-target="#programs" type="button" role="tab" aria-controls="programs" aria-selected="false">Programs</a>
                                </li>
                            @endif

                            @if($school->admissions_status == 'Yes')
                                <li class="nav-item" role="presentation">
                                    <a href="#tab-admissions" class="nav-link futura" id="admissions-tab" data-bs-toggle="tab" data-bs-target="#admissions" type="button" role="tab" aria-controls="admissions" aria-selected="false">Admissions</a>
                                </li>
                            @endif

                            @if($school->financial_status == 'Yes')
                                <li class="nav-item" role="presentation">
                                    <a href="#tab-financial" class="nav-link futura" id="financial-tab" data-bs-toggle="tab" data-bs-target="#financial" type="button" role="tab" aria-controls="financial" aria-selected="false">Financials</a>
                                </li>
                            @endif

                            @if($school->scholarships_status == 'Yes')
                                <li class="nav-item" role="presentation">
                                    <a href="#tab-scholarships" class="nav-link futura" id="scholarships-tab" data-bs-toggle="tab" data-bs-target="#scholarships" type="button" role="tab" aria-controls="scholarships" aria-selected="false">Scholarships</a>
                                </li>
                            @endif

                            @if($school->contacts_status == 'Yes')
                                <li class="nav-item" role="presentation">
                                    <a href="#tab-contact" class="nav-link futura" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Contacts</a>
                                </li>
                            @endif
                        </ul>
                        
                        <div class="tab-content" id="myTabContent" style="text-align: justify;">

                            @if($school->quick_facts_status == 'Yes')
                                <div class="tab-pane fade show active" id="quick-facts" role="tabpanel" aria-labelledby="quick-facts-tab">

                                    @if($marked_facts != null)
                                        <div class="row mb-5">
                                            @foreach($marked_facts as $marked)
                                                <div class="col-3 mb-4">
                                                    <div class="single-fact text-center p-3">
                                                        <h6 class="fw-bold mb-1">{{ str_replace("_", " " , ucfirst($marked)) }}</h6>
                                                        @if($school->$marked != null)
                                                            @if($marked == 'school_type')
                                                                <p class="gray">{{ App\Models\SchoolTypes::where('id', $school->school_type)->first()->name }}</p>
                                                            @else
                                                                <p class="gray">{{ $school->$marked }}</p>
                                                            @endif
                                                        @else
                                                            <p class="gray">Not defined</p>
                                                        @endif
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif

                                    @if($school->quick_facts_title_1 != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->quick_facts_title_1 }}</h4>

                                                <div class="gray">
                                                    {!! $school->quick_facts_title_1_paragraph !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if($school->quick_facts_title_2 != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->quick_facts_title_2 }}</h4>

                                                <div class="row align-items-center">
                                                    <div class="col-6 position-relative">
                                                        @if($school->quick_facts_title_2_image != null)
                                                            <img src="{{ url('images/schools', $school->quick_facts_title_2_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">
                                                        @endif

                                                        <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->quick_facts_title_2_image_name }}</p>
                                                    </div>
                                                    <div class="col-6">
                                                        <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->quick_facts_title_2_sub_title }}</h5>

                                                        <div class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{!! $school->quick_facts_title_2_paragraph !!}</div>

                                                        @if($school->quick_facts_title_2_button != null)
                                                            <div class="text-end">
                                                                <a href="{{ $school->quick_facts_title_2_link }}" class="btn red-btn text-white" target="_blank">{{ $school->quick_facts_title_2_button }}</a>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    

                                    @if($school->other_button_title != null)
                                        <div class="row justify-content-center mb-5">
                                            <div class="col-7 text-center">
                                                <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank" style="font-size: 1.1rem;">{{ $school->other_button_title}}</a>
                                            </div>
                                        </div>
                                    @endif

                                    @if($school->main_button_title != null)
                                        @if($school->main_button_link != null)
                                            <div class="row mb-5">
                                                <div class="col-12">
                                                    <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                        <div class="row red-btn rounded">
                                                            <div class="col-1" style="max-width: 0.333333%;"></div>
                                                            <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                                <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                            </div>
                                                            <div class="col-7 py-3">
                                                                <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @else
                                            <div class="row mb-5">
                                                <div class="col-12">
                                                    <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                        <div class="row red-btn rounded">
                                                            <div class="col-1" style="max-width: 0.333333%;"></div>
                                                            <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                                <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                            </div>
                                                            <div class="col-7 py-3">
                                                                <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        @endif
                                    @endif

                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Related articles</h4>

                                            <div class="row align-items-center">
                                                @foreach($articles as $key => $article)

                                                    <div class="col-4">
                                                        <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                                            <div class="card border-0">
                                                                @if($article->image != null)
                                                                    <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                                @else
                                                                    <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                                @endif
                                                                <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                                                    <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            @endif

                            <div class="tab-pane fade" id="overview" role="tabpanel" aria-labelledby="overview-tab">

                                @if($school->overview_title_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_1 }}</h4>

                                            <div class="gray">
                                                {!! $school->overview_title_1_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_text_content_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="gray p-3" style="background-color: #f2f4f8;">
                                                {!! $school->overview_text_content_1 !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->overview_title_2 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_2 }}</h4>

                                            <div>
                                                @if(json_decode($school->overview_title_2_bullets) != null)
                                                    @foreach(json_decode($school->overview_title_2_bullets) as $bullet)
                                                        @if($bullet != null)
                                                            
                                                            <p class="gray mb-3"><i class="fas fa-stop me-3" style="transform: rotate(45deg); color: #01468f; font-size: 0.6rem; bottom: 0.07rem;position: relative;"></i>{{ $bullet }}</p>
                                                                
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_3_sub_title != null)
                                    <div class="row mb-5">
                                        <div class="col-12">

                                            <div class="row align-items-center">
                                                <div class="col-7 position-relative">
                                                    <img src="{{ url('images/schools', $school->overview_title_3_image) }}" alt="" class="img-fluid w-100" style="height: 18rem; object-fit: cover;">

                                                    <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->overview_title_3_image_name }}</p>
                                                </div>
                                                <div class="col-5">
                                                    <h5 class="fw-bold mb-2" style="color: #384058">{{$school->overview_title_3_sub_title }}</h5>

                                                    <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->overview_title_3_paragraph }}</p>

                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            <p class="gray">{{ $school->overview_title_3_date }}</p>
                                                        </div>
                                                        <!-- <div class="col-2 text-end">
                                                            <a href="{{ $school->overview_title_3_link }}" class="gray" target="_blank"><i class="fas fa-long-arrow-alt-right"></i></a>
                                                        </div> -->
                                                        <div class="col-6 text-end">
                                                            <a href="{{ $school->overview_title_3_link }}" class="btn red-btn text-white" target="_blank">{{ $school->overview_title_3_button }}</a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_4 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_4 }}</h4>

                                            <div class="gray mb-2">
                                                {!! $school->overview_title_4_paragraph !!}
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-8">
                                                    <img src="{{ url('images/schools', $school->overview_title_4_image) }}" alt="" class="img-fluid w-100" style="height: 18rem; object-fit: cover;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_5 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_5 }}</h4>

                                            <div class="gray mb-2">
                                                {!! $school->overview_title_5_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_6 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_6 }}</h4>

                                            <div class="gray mb-2">
                                                {!! $school->overview_title_6_paragraph !!}
                                            </div>

                                            <!-- <div class="text-end">
                                                <a href="{{ $school->overview_title_6_link }}" class="text-decoration-none fw-bold" style="font-size: 0.8rem" target="_blank"><span style="color: red;">{{ $school->overview_title_6_button }}</span><i class="fas fa-long-arrow-alt-right gray ms-3"></i></a>
                                            </div> -->

                                            <div class="text-end">
                                                <a href="{{ $school->overview_title_6_link }}" class="btn red-btn text-white" target="_blank">{{ $school->overview_title_6_button }}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif -->

                                @if($school->overview_title_7 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_7 }}</h4>

                                            <div class="gray mb-2">
                                                {!! $school->overview_title_7_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->overview_title_8 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_8 }}</h4>
                                                
                                            <div class="gray mb-2">
                                                {!! $school->overview_title_8_paragraph !!}
                                            </div>

                                            <!-- <div class="row justify-content-end">
                                                <div class="col-3 text-end">
                                                    <a href="{{ $school->overview_title_8_link }}" class="text-decoration-none fw-bold" style="font-size: 0.8rem; color: red;" target="_blank">Read more</a>
                                                </div>
                                            </div> -->

                                            <div class="text-end">
                                                <a href="{{ $school->overview_title_8_link }}" class="btn red-btn text-white" target="_blank">{{ $school->overview_title_8_button }}</a>
                                            </div>

                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_9 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_9 }}</h4>

                                            <div class="row align-items-center">
                                                <div class="col-6 position-relative">
                                                    <img src="{{ url('images/schools', $school->overview_title_9_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">

                                                    <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->overview_title_9_image_name }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->overview_title_9_sub_title }}</h5>

                                                    <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->overview_title_9_paragraph }}</p>

                                                    <div class="text-end">
                                                        <a href="{{ $school->overview_title_9_link }}" class="btn red-btn text-white" target="_blank">{{ $school->overview_title_9_button }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_10 != null)
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="p-3" style="background-color: #f2f4f8;">
                                                <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_10 }}</h4>

                                                <div class="gray mb-2">
                                                    {!! $school->overview_title_10_paragraph !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(json_decode($school->overview_related_programs) != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Program name</th>
                                                        <th scope="col" class="text-center">Length</th>
                                                        <th scope="col">Tuition, International students</th>
                                                        <th scope="col" class="text-center">Tuition, Canadian students</th>
                                                        <th scope="col">Tuition, Provincial students</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(json_decode($school->overview_related_programs) as $related)
                                                        <tr style="font-size: 0.95rem;">
                                                            <td style="word-break: break-all;">{{ $related->name }}</td>
                                                            <td class="text-center">{{ $related->length }}</td>
                                                            <td class="text-center fw-bold">${{ $related->international }}</td>
                                                            <td class="text-center fw-bold">${{ $related->canadian }}</td>
                                                            <td class="text-center fw-bold">${{ $related->provincial }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_11 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_11 }}</h4>

                                            <div class="gray">
                                                {!! $school->overview_title_11_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->overview_title_12 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_12 }}</h4>

                                            <div>
                                            @if(json_decode($school->overview_title_12_bullets) != null)
                                                @foreach(json_decode($school->overview_title_12_bullets) as $bullet)
                                                    @if($bullet != null)
                                                        
                                                        <p class="gray mb-3"><i class="fas fa-stop me-3" style="transform: rotate(45deg); color: #01468f; font-size: 0.8rem;"></i>{{ $bullet }}</p>
                                                            
                                                    @endif
                                                @endforeach
                                            @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif
 
                                @if($school->overview_title_13 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->overview_title_13 }}</h4>

                                            <div class="gray">
                                                {!! $school->overview_title_13_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(count($overview_faqs) > 0)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Frequently asked questions</h4>

                                            <div class="accordion" id="accordionExample">
                                                @foreach($overview_faqs as $overview_faq)
                                                    <div class="accordion-item mb-3 rounded-0 border-0">
                                                        <h2 class="accordion-header border" id="heading-{{ $overview_faq->id }}">
                                                            <button class="accordion-button collapsed rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $overview_faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $overview_faq->id }}" style="color: #384058; font-weight: 700">
                                                                {{ $overview_faq->question }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-{{ $overview_faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $overview_faq->id }}" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body gray">
                                                                <p class="gray">{{ $overview_faq->answer }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank" style="font-size: 1.1rem;">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif

                                @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="fw-bold mb-2 futura" style="color: #384058">Related articles</h4>

                                        <div class="row align-items-center">
                                            @foreach($articles as $key => $article)

                                                <div class="col-4">
                                                    <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                                        <div class="card border-0">
                                                            @if($article->image != null)
                                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @endif
                                                            <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="programs" role="tabpanel" aria-labelledby="programs-tab">

                                @if($school->programs_title_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->programs_title_1 }}</h4>
                                            <div class="gray">{!! $school->programs_page_paragraph !!}</div>
                                        </div>
                                    </div>
                                @endif

                                @if(count($total_programs) > 0)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <table class="table table-striped table-bordered">
                                                <tbody>
                                                    @if(count($high_school_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058;">High school</h5>
                                                                @foreach($high_school_programs as $high_school_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$high_school_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if(count($language_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058;">Language programs</h5>
                                                                @foreach($language_programs as $language_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$language_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if(count($certificate_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058; ">Certificate / short term</h5>
                                                                @foreach($certificate_programs as $certificate_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$certificate_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if(count($summer_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058; ">Summer</h5>
                                                                @foreach($summer_programs as $summer_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$summer_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if(count($community_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058; ">Community college</h5>
                                                                @foreach($community_programs as $community_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$community_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if(count($bachelor_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058; ">Bachelor degree</h5>
                                                                @foreach($bachelor_programs as $bachelor_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$bachelor_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if(count($master_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058; ">Masters</h5>
                                                                @foreach($master_programs as $master_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$master_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif

                                                    @if(count($online_programs) > 0)
                                                        <tr>
                                                            <td>
                                                                <h5 class="mb-2 fw-bold futura" style="color: #384058; ">Masters</h5>
                                                                @foreach($online_programs as $online_program)
                                                                    <p><i class="fas fa-circle me-2" style="color: #384058"></i>{{ App\Models\Programs::where('id',$online_program->program_id)->first()->name }}</p>
                                                                @endforeach
                                                            </td>
                                                        </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank" style="font-size: 1.1rem;">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif

                                @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="fw-bold mb-2 futura" style="color: #384058">Related articles</h4>

                                        <div class="row align-items-center">
                                            @foreach($articles as $key => $article)

                                                <div class="col-4">
                                                    <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                                        <div class="card border-0">
                                                            @if($article->image != null)
                                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @endif
                                                            <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="admissions" role="tabpanel" aria-labelledby="admissions-tab">

                                @if($school->admission_paragraph != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="gray">
                                                {!! $school->admission_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(count($admission_employees) != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Meet our team</h4>

                                            @foreach($admission_employees as $admission_employee)
                                                <div class="p-3 mb-4" style="background-color: #f2f4f8;">

                                                    <div class="row">
                                                        <div class="col-5">
                                                            @if($admission_employee->image != null)
                                                                <img src="{{ url('images/schools', $admission_employee->image) }}" alt="" class="img-fluid w-100" style="height: 14rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 14rem; object-fit: cover;">
                                                            @endif
                                                        </div>

                                                        <div class="col-7">
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Name</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <h6 class="fw-bolder">{{ $admission_employee->name }}</h6>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Position</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $admission_employee->position }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Description</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $admission_employee->description }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Phone</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $admission_employee->phone }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">More 1</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $admission_employee->more_1 }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Email</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $admission_employee->email }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">More 2</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $admission_employee->more_2 }}</p>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                <!-- @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif


                                @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif -->


                                @if($school->admission_title_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->admission_title_1 }}</h4>

                                            <div class="gray">
                                                {!! $school->admission_title_1_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->admission_text_content_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="gray p-3" style="background-color: #f2f4f8;">
                                                {!! $school->admission_text_content_1 !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->admission_title_2 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->admission_title_2 }}</h4>

                                            <div>
                                                @if(json_decode($school->admission_title_2_bullets) != null)
                                                    @foreach(json_decode($school->admission_title_2_bullets) as $bullet)
                                                        @if($bullet != null)
                                                            
                                                            <p class="gray mb-3"><i class="fas fa-stop me-3" style="transform: rotate(45deg); color: #01468f; font-size: 0.6rem; bottom: 0.07rem;position: relative;"></i>{{ $bullet }}</p>
                                                                
                                                        @endif
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->admission_title_3 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">

                                            <h4 class="fw-bold p-3 futura" style="color: #384058; background-color: #dee3ed;">{{ $school->admission_title_3 }}</h4>

                                            <div class="p-3" style="background-color: #f2f4f8">
                                                {!! $school->admission_title_3_paragraph !!}
                                            </div>
                                            
                                        </div>
                                    </div>
                                @endif

                                @if($school->admission_title_4 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">

                                            <h4 class="fw-bold p-3 futura" style="color: #384058; background-color: #dee3ed;">{{ $school->admission_title_4 }}</h4>

                                            <div class="p-3" style="background-color: #f2f4f8">
                                                {!! $school->admission_title_4_paragraph !!}
                                            </div>
                                            
                                        </div>
                                    </div>
                                @endif

                                @if($school->admission_title_5 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold p-3 futura" style="color: #384058; background-color: #dee3ed;">{{ $school->admission_title_5 }}</h4>

                                            <div class="p-3" style="background-color: #f2f4f8">
                                                {!! $school->admission_title_5_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if(count($admission_faqs) > 0)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Frequently asked questions</h4>

                                            <div class="accordion" id="accordionExample">
                                                @foreach($admission_faqs as $admission_faq)
                                                    <div class="accordion-item mb-3 rounded-0 border-0">
                                                        <h2 class="accordion-header border" id="heading-{{ $admission_faq->id }}">
                                                            <button class="accordion-button collapsed rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $admission_faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $admission_faq->id }}" style="color: #384058; font-weight: 700">
                                                                {{ $admission_faq->question }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-{{ $admission_faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $admission_faq->id }}" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body gray">
                                                                <p class="gray">{{ $admission_faq->answer }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank" style="font-size: 1.1rem;">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif

                                @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="fw-bold mb-2 futura" style="color: #384058">Related articles</h4>

                                        <div class="row align-items-center">
                                            @foreach($articles as $key => $article)

                                                <div class="col-4">
                                                    <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                                        <div class="card border-0">
                                                            @if($article->image != null)
                                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @endif
                                                            <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="financial" role="tabpanel" aria-labelledby="financial-tab">

                                @if($school->financial_title_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->financial_title_1 }}</h4>

                                            <div class="gray">
                                                {!! $school->financial_title_1_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->financial_title_2 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->financial_title_2 }}</h4>

                                            <ul class="nav nav-tabs financial-tabs" id="myTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="financial-tab-tab1" data-bs-toggle="tab" data-bs-target="#financial-tab1" type="button" role="tab" aria-controls="home" aria-selected="true">{{ $school->financial_title_2_tab_1 }}</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="financial-tab-tab2" data-bs-toggle="tab" data-bs-target="#financial-tab2" type="button" role="tab" aria-controls="profile" aria-selected="false">{{ $school->financial_title_2_tab_2 }}</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="financial-tab-tab3" data-bs-toggle="tab" data-bs-target="#financial-tab3" type="button" role="tab" aria-controls="contact" aria-selected="false">{{ $school->financial_title_2_tab_3 }}</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content">

                                                <div class="tab-pane fade show active" id="financial-tab1" role="tabpanel" aria-labelledby="financial-tab-tab1">

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_1_sub_title_1 }}</h6>

                                                    <div class="row p-3">
                                                        <div class="col-6">
                                                            <p class="fw-bold">{{ $school->financial_tab_1_sub_title_1_bullet }}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fw-bold">{{ $school->financial_tab_1_sub_title_1_bullet_price }}</p>
                                                        </div>
                                                    </div>

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_1_sub_title_2 }}</h6>

                                                    <div class="gray p-3">
                                                        {!! $school->financial_tab_1_sub_title_2_paragraph !!}
                                                    </div>

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_1_sub_title_3 }}</h6>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_1_sub_title_3_bullet_1 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_1_sub_title_3_bullet_1_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom" style="background-color: #f2f4f8;">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_1_sub_title_3_bullet_2 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_1_sub_title_3_bullet_2_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_1_sub_title_3_bullet_3 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_1_sub_title_3_bullet_3_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gray p-3" style="background-color: #f2f4f8;">
                                                        {!! $school->financial_tab_1_sub_title_3_paragraph !!}
                                                    </div>

                                                </div>

                                                <div class="tab-pane fade" id="financial-tab2" role="tabpanel" aria-labelledby="financial-tab-tab2">

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_2_sub_title_1 }}</h6>

                                                    <div class="row p-3">
                                                        <div class="col-6">
                                                            <p class="fw-bold">{{ $school->financial_tab_2_sub_title_1_bullet }}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fw-bold">{{ $school->financial_tab_2_sub_title_1_bullet_price }}</p>
                                                        </div>
                                                    </div>

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_2_sub_title_2 }}</h6>

                                                    <div class="gray p-3">
                                                        {!! $school->financial_tab_2_sub_title_2_paragraph !!}
                                                    </div>

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_2_sub_title_3 }}</h6>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_2_sub_title_3_bullet_1 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_2_sub_title_3_bullet_1_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom" style="background-color: #f2f4f8;">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_2_sub_title_3_bullet_2 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_2_sub_title_3_bullet_2_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_2_sub_title_3_bullet_3 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_2_sub_title_3_bullet_3_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gray p-3" style="background-color: #f2f4f8;">
                                                        {!! $school->financial_tab_2_sub_title_3_paragraph !!}
                                                    </div>

                                                </div>

                                                <div class="tab-pane fade" id="financial-tab3" role="tabpanel" aria-labelledby="financial-tab-tab3">

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_3_sub_title_1 }}</h6>

                                                    <div class="row p-3">
                                                        <div class="col-6">
                                                            <p class="fw-bold">{{ $school->financial_tab_3_sub_title_1_bullet }}</p>
                                                        </div>
                                                        <div class="col-6">
                                                            <p class="fw-bold">{{ $school->financial_tab_3_sub_title_1_bullet_price }}</p>
                                                        </div>
                                                    </div>

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_3_sub_title_2 }}</h6>

                                                    <div class="gray p-3">
                                                        {!! $school->financial_tab_3_sub_title_2_paragraph !!}
                                                    </div>

                                                    <h6 class="fw-bold p-3 border-bottom" style="background-color: #f2f4f8;">{{ $school->financial_tab_3_sub_title_3 }}</h6>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_3_sub_title_3_bullet_1 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_3_sub_title_3_bullet_1_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom" style="background-color: #f2f4f8;">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_3_sub_title_3_bullet_2 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_3_sub_title_3_bullet_2_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row px-3">
                                                        <div class="col-12 py-3 border-bottom">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_3_sub_title_3_bullet_3 }}</p>
                                                                </div>
                                                                <div class="col-6">
                                                                    <p class="fw-bold">{{ $school->financial_tab_3_sub_title_3_bullet_3_price }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="gray p-3" style="background-color: #f2f4f8;">
                                                        {!! $school->financial_tab_3_sub_title_3_paragraph !!}
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->financial_title_3 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->financial_title_3 }}</h4>

                                            <div class="gray">
                                                {!! $school->financial_title_3_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif -->

                                @if($school->financial_title_4 != null)
                                    <div class="row px-3">
                                        <div class="col-12">
                                            <div class="row py-3" style="background-color: #f2f4f8;">
                                                <div class="col-12">
                                                    <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->financial_title_4 }}</h4>

                                                    <div class="gray">
                                                        {!! $school->financial_title_4_paragraph !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if(json_decode($school->financial_related_programs_4) != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Program name</th>
                                                        <th scope="col" class="text-center">Length</th>
                                                        <th scope="col">Tuition, International students</th>
                                                        <th scope="col" class="text-center">Tuition, Canadian students</th>
                                                        <th scope="col">Tuition, Provincial students</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(json_decode($school->financial_related_programs_4) as $related4)
                                                        <tr style="font-size: 0.95rem;">
                                                            <td>{{ $related4->name }}</td>
                                                            <td class="text-center">{{ $related4->length }}</td>
                                                            <td class="text-center fw-bold">${{ $related4->international }}</td>
                                                            <td class="text-center fw-bold">${{ $related4->canadian }}</td>
                                                            <td class="text-center fw-bold">${{ $related4->provincial }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif

                                @if($school->financial_title_5 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->financial_title_5 }}</h4>

                                            <div class="gray">
                                                {!! $school->financial_title_5_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->financial_title_6 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="row py-3">
                                                <div class="col-12">
                                                    <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->financial_title_6 }}</h4>

                                                    <div class="gray">
                                                        {!! $school->financial_title_6_paragraph !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- @if(json_decode($school->financial_related_programs_6) != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Program name</th>
                                                        <th scope="col" class="text-center">Length</th>
                                                        <th scope="col" class="text-center">Tuition, Canadian student</th>
                                                        <th scope="col">Tuition, international student</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach(json_decode($school->financial_related_programs_6) as $related6)
                                                        <tr style="font-size: 0.95rem;">
                                                            <td style="word-break: break-all;">{{ $related6->name }}</td>
                                                            <td class="text-center">{{ $related6->length }}</td>
                                                            <td class="text-center fw-bold">${{ $related6->canadian }}</td>
                                                            <td class="text-center fw-bold">${{ $related6->international }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                @endif -->

                                @if($school->financial_text_content_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="gray p-3" style="background-color: #f2f4f8;">
                                                {!! $school->financial_text_content_1 !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if(count($financial_faqs) > 0)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Frequently asked questions</h4>

                                            <div class="accordion" id="accordionExample">
                                                @foreach($financial_faqs as $financial_faq)
                                                    <div class="accordion-item mb-3 rounded-0 border-0">
                                                        <h2 class="accordion-header border" id="heading-{{ $financial_faq->id }}">
                                                            <button class="accordion-button collapsed rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $financial_faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $financial_faq->id }}" style="color: #384058; font-weight: 700">
                                                                {{ $financial_faq->question }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-{{ $financial_faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $financial_faq->id }}" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body gray">
                                                                <p class="gray">{{ $financial_faq->answer }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank" style="font-size: 1.1rem;">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif

                                @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="fw-bold mb-2 futura" style="color: #384058">Related articles</h4>

                                        <div class="row align-items-center">
                                            @foreach($articles as $key => $article)

                                                <div class="col-4">
                                                    <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                                        <div class="card border-0">
                                                            @if($article->image != null)
                                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @endif
                                                            <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="scholarships" role="tabpanel" aria-labelledby="scholarships-tab">

                                @if($school->scholarships_title_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->scholarships_title_1 }}</h4>

                                            <div class="gray">
                                                {!! $school->scholarships_title_1_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                @if($school->scholarships_text_content_1 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            
                                            <div class="gray p-3" style="background-color: #f2f4f8;">
                                                {!! $school->scholarships_text_content_1 !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif -->

                                @if(count($scholarships) > 0)

                                    @include('frontend.includes.scholarship_search')
                                

                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Scholarships</h4>

                                            @foreach($scholarships as $scholarship)
                                                <div class="p-3 mb-4" style="background-color: #f2f4f8;">

                                                    <div class="row">
                                                        <div class="col-4">
                                                            @if($scholarship->image != null)
                                                                <img src="{{ url('images/schools', $scholarship->image) }}" alt="" class="img-fluid mb-3 w-100" style="height: 10rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100 mb-3" style="height: 10rem; object-fit: cover;">
                                                            @endif

                                                            <div class="text-center">
                                                                <a href="{{ $scholarship->link }}" type="button" class="btn btn-primary py-2 w-100 text-white" id="apply_btn" target="_blank">Apply now</a>
                                                            </div>
                                                        </div>

                                                        <div class="col-8">
                                                            <div class="row align-items-center mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Name</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <h6 class="fw-bolder">{{ $scholarship->name }}</h6>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Summary</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $scholarship->summary }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Basic Eligibility</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    @foreach(json_decode($scholarship->eligibility) as $eligibility)
                                                                        <p class="gray">{{ $eligibility }}</p>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Award</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $scholarship->award }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Action</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $scholarship->action }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Deadline</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $scholarship->deadline }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Level of study</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $scholarship->level_of_study }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="row mb-2">
                                                                <div class="col-4">
                                                                    <div class="row">
                                                                        <div class="col-10">
                                                                            <p class="fw-bold">Availability</p>
                                                                        </div>
                                                                        <div class="col-1 p-0">
                                                                            <p class="fw-bold">:</p>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="col-8">
                                                                    <p class="gray">{{ $scholarship->availability }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                            @endforeach

                                            <div class="text-center">
                                                <a href="{{ route('frontend.single_school_scholarships', [$school->id, $school->slug]) }}" class="btn text-white fw-bold red-btn w-50 py-3">View all scholarships</a>
                                            </div>
                                        </div>
                                    </div>

                                @endif

                                

                                <!-- @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-4 py-3 col-red-btn" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-8 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif -->


                                @if($school->scholarships_text_content_2 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            
                                            <div class="gray p-3" style="background-color: #f2f4f8;">
                                                {!! $school->scholarships_text_content_2 !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->scholarships_title_2 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->scholarships_title_2 }}</h4>

                                            <div class="row align-items-center">
                                                <div class="col-6 position-relative">
                                                    <img src="{{ url('images/schools', $school->scholarships_title_2_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">

                                                    <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->scholarships_title_2_image_name }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_2_sub_title }}</h5>

                                                    <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->scholarships_title_2_paragraph }}</p>

                                                    <div class="text-end">
                                                        <a href="{{ $school->quick_facts_title_2_link }}" class="btn red-btn text-white" target="_blank">{{ $school->scholarships_title_2_button }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->scholarships_title_3 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->scholarships_title_3 }}</h4>

                                            <div class="gray">
                                                {!! $school->scholarships_title_3_paragraph !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->scholarships_text_content_3 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            
                                            <div class="gray p-3" style="background-color: #f2f4f8;">
                                                {!! $school->scholarships_text_content_3 !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->scholarships_title_4 != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">{{ $school->scholarships_title_4 }}</h4>

                                            <div class="row align-items-center">
                                                <div class="col-6 position-relative">
                                                    <img src="{{ url('images/schools', $school->scholarships_title_4_image) }}" alt="" class="img-fluid w-100" style="height: 15rem; width: 100%; object-fit: cover;">

                                                    <p class="text-white fw-bold position-absolute" style="bottom: 0.5rem; left: 2rem;">{{ $school->scholarships_title_4_image_name }}</p>
                                                </div>
                                                <div class="col-6">
                                                    <h5 class="fw-bold mb-2" style="color: #384058">{{ $school->scholarships_title_4_sub_title }}</h5>

                                                    <p class="gray mb-3" style="text-align: justify; overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 7; -webkit-box-orient: vertical;">{{ $school->scholarships_title_4_paragraph }}</p>

                                                    <div class="text-end">
                                                        <a href="{{ $school->quick_facts_title_2_link }}" class="btn red-btn text-white" target="_blank">{{ $school->scholarships_title_4_button }}</a>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if(count($scholarship_faqs) > 0)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Frequently asked questions</h4>

                                            <div class="accordion" id="accordionExample">
                                                @foreach($scholarship_faqs as $scholarship_faq)
                                                    <div class="accordion-item mb-3 rounded-0 border-0">
                                                        <h2 class="accordion-header border" id="heading-{{ $scholarship_faq->id }}">
                                                            <button class="accordion-button collapsed rounded-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $scholarship_faq->id }}" aria-expanded="true" aria-controls="collapse-{{ $scholarship_faq->id }}" style="color: #384058; font-weight: 700">
                                                                {{ $scholarship_faq->question }}
                                                            </button>
                                                        </h2>
                                                        <div id="collapse-{{ $scholarship_faq->id }}" class="accordion-collapse collapse" aria-labelledby="heading-{{ $scholarship_faq->id }}" data-bs-parent="#accordionExample">
                                                            <div class="accordion-body gray">
                                                                <p class="gray">{{ $scholarship_faq->answer }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                @endif


                                @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank" style="font-size: 1.1rem;">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif

                                @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                                <div class="row mb-5">
                                    <div class="col-12">
                                        <h4 class="fw-bold mb-2 futura" style="color: #384058">Related articles</h4>

                                        <div class="row align-items-center">
                                            @foreach($articles as $key => $article)

                                                <div class="col-4">
                                                    <a href="{{ route('frontend.single_article', [str_replace('_', '-', $article->type), $article->id]) }}" class="text-decoration-none">
                                                        <div class="card border-0">
                                                            @if($article->image != null)
                                                                <img src="{{ url('images/articles', $article->image) }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 10rem; object-fit: cover;">
                                                            @endif
                                                            <div class="card-body text-center card-padding {{ $key % 2 == 0 ? 'article-red': 'article-blue' }} rounded-0">
                                                                <h6 class="card-title fw-bold futura">{{ $article->title }}</h6>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">

                                @if($school->contacts_page_paragraph != null)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <div class="gray">{!! $school->contacts_page_paragraph !!}</div>
                                        </div>
                                    </div>
                                @endif

                                @if(count($contacts) > 0)
                                    <div class="row mb-5">
                                        <div class="col-12">
                                            <h4 class="fw-bold mb-2 futura" style="color: #384058">Contact {{ $school->name }}</h4>
                                            
                                            @foreach ($contacts as $contact)
                                                <div class="p-3 mb-4" style="background-color: #f2f4f8;">
                                                    <div class="row align-items-center">
                                                        <div class="col-6">
                                                            @if($contact->image != null)
                                                                <img src="{{ url('images/schools', $contact->image) }}" alt="" class="img-fluid" style="height: 14rem; object-fit: cover;">
                                                            @else
                                                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 14rem; object-fit: cover;">
                                                            @endif
                                                        </div>
                                                        <div class="col-6">
                                                            <h6 class="fw-bold mb-2" style="color: #384058">{{ $contact->name }}</h6>
                                                            <p class="gray mb-1" style="color: #384058">{{ $contact->department }}</p>
                                                            <p class="gray mb-1" style="color: #384058">{{ $contact->address }}</p>
                                                            <p class="gray mb-1" style="color: #384058">{{ $contact->city_province_postal_code }}</p>
                                                            <p class="gray mb-1" style="color: #384058">{{ $contact->country }}</p>
                                                            <p class="gray mb-1" style="color: #384058">Tel: {{ $contact->phone }}</p>
                                                            <p class="gray mb-1" style="color: #384058">Fax: {{ $contact->fax }}</p>
                                                            <p class="gray mb-1" style="color: #384058">Website: <a href="" class="text-decoration-none" style="color: #bd2130" target="_blank">{{ $contact->website }}</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                                @if($school->other_button_title != null)
                                    <div class="row justify-content-center mb-5">
                                        <div class="col-7 text-center">
                                            <a href="{{ $school->other_button_link }}" class="btn text-white red-btn w-100 py-3" target="_blank" style="font-size: 1.1rem;">{{ $school->other_button_title}}</a>
                                        </div>
                                    </div>
                                @endif

                                @if($school->main_button_title != null)
                                    @if($school->main_button_link != null)
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ $school->main_button_link }}" class="btn text-white fw-bold w-100" target="_blank">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row mb-5">
                                            <div class="col-12">
                                                <a href="{{ route('frontend.master_application', [$school->id, $school->slug]) }}" class="btn text-white fw-bold w-100">
                                                    <div class="row red-btn rounded">
                                                        <div class="col-1" style="max-width: 0.333333%;"></div>
                                                        <div class="col-4 py-3 col-red-btn rounded-0" style="border-top-left-radius: 0.25rem; border-bottom-left-radius: 0.25rem;">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_sub_title }}</p>
                                                        </div>
                                                        <div class="col-7 py-3">
                                                            <p class="futura" style="font-size: 1.1rem;">{{ $school->main_button_title }}</p>
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                @endif

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you very much for your application. School will contact you as soon as possible.</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endif



@push('after-scripts')
    <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiper", {
        // loop : true,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
    </script>


    <script type='text/javascript'>

        var hash = location.hash.replace(/^#/, '');

        if (hash) {
            $('.main-nav a[href="#' + hash + '"]').tab('show');
        } 


        $('.main-nav a').on('shown.bs.tab', function (e) {
            window.location.hash = e.target.hash;

            // window.scrollTo({ top: 0, behavior: 'smooth' });
        
        })

        $(document).ready(function() {
            $('.main-nav').children('li').each(function () {
                if($(this).find('a').hasClass('active')) {
                    let id = $(this).find('a').attr('id');

                    $('#myTabContent').children('div').each(function () {
                        if($(this).attr('aria-labelledby') == id) {
                            $(this).addClass('active');
                            $(this).addClass('show')
                        }
                        else {
                            $(this).removeClass('active');
                            $(this).removeClass('show');
                        }
                    });
                }
            });
        });
        
    </script>



    <!-- Master application scripts -->

    <script>
        $('#other').click(function() {
            if(this.checked) {
                $("#text-other").removeAttr('disabled');
            } else {
                $("#text-other").attr('disabled' , 'disabled');
            }
        });
    </script>

    <script>
        $('#status-other').click(function() {
            if(this.checked) {
                $("#text-status").removeAttr('disabled');
            } else {
                $("#text-status").attr('disabled' , 'disabled');
            }
        });
    </script>

    <script>
        $('#funding-source-other').click(function() {
            if(this.checked) {
                $("#funding-source-status").removeAttr('disabled');
            } else {
                $("#funding-source-status").attr('disabled' , 'disabled');
            }
        });
    </script>


    <script>
        $('.test-box').click(function() {
            if(this.checked) {
                $(this).parents('.test').next().find('input').removeAttr('disabled');
            } else {
                $(this).parents('.test').next().find('input').attr('disabled' , 'disabled');
                $(this).parents('.test').next().find('input').val('');
            }
        });
    </script>

    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>

    <script>
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>

    <script>
        $("#confirm-email").on("change keyup paste", function(){
            if($(this).val() == '' && $('#email').val() == ''){
                $('.email-warning').addClass('d-none');
                // $(this).css('border', '1px solid #ced4da');
            }
            else if( $(this).val() != $('#email').val() ) {
                $('.email-warning').removeClass('d-none');
                // $(this).css('border', '1px solid red');
            }
            else if($(this).val() == $('#email').val()){
                $('.email-warning').addClass('d-none');
                // $(this).css('border', '1px solid #ced4da');
            }
            
        })

        $("#email").on("change keyup paste", function(){
            if($(this).val() == '' && $('#confirm-email').val() == ''){
                $('.email-warning').addClass('d-none');
            }
            else if( $(this).val() != $('#confirm-email').val() ) {
                $('.email-warning').removeClass('d-none');
            }
            else if($(this).val() == $('#confirm-email').val()){
                $('.email-warning').addClass('d-none');
            }
            
        })
    </script>

    <script>
        $('.same').click(function() {
            if(this.checked) {
                $('#residence-country').val($('#citizenship-country').val());
                $('#residence-postal').val($('#citizenship-postal').val());
            } else {
                $('#residence-country').val('');
                $('#residence-postal').val('');
            }
        });
    </script>

    <script>
        $('#citizenship-live').on('change', function() {
            if($(this).val() == 'Yes') {
                $('#country').attr('disabled', 'disabled');
                $('#status').attr('disabled', 'disabled');
            }
            else {
                $('#country').removeAttr('disabled', 'disabled');
                $('#status').removeAttr('disabled', 'disabled');
            }
        })
    </script>

    <!-- stop dropdown close when click inside -->
    <script>
        $(".dropdown-menu").click(function(e){
            e.stopPropagation();
        })
    </script>


    <!-- calender -->
    <script>
       // Initialize all input of type date
        var dob = bulmaCalendar.attach('.dob',{
            type: 'date',
            dateFormat: 'yyyy/MM/dd'
        });

        var startDate = bulmaCalendar.attach('.start-date',{
            type: 'date',
            dateFormat: 'yyyy/MM/dd'
        });

    
        $('.datetimepicker-dummy .datetimepicker-dummy-wrapper .is-hidden').attr('type', 'hidden');
    </script>

    <script>
        $('.more-test-check').click(function() {
            if(this.checked) {
                $(this).parents('.input-group-text').next().removeAttr('disabled');
            } else {
                $(this).parents('.input-group-text').next().attr('disabled', 'disabled');
            }
        });

        $(".more-test").on("change keyup paste", function(){
            if($(this).val() != ''){
                $(this).parents('.test').next().find('input').removeAttr('disabled');
            }
            else {
                $(this).parents('.test').next().find('input').attr('disabled', 'disabled');
            }
        })
    </script>


    <script>
        $('.dropdown-menu input[type="checkbox"]').on('click', function() {
            let count = $(this).parents('.dropdown-menu').find('input:checkbox:checked').length;

            if(count == 1) {
                let value = $(this).parents('.dropdown-menu').find('input:checkbox:checked').val();
                $(this).parents('.dropdown-menu').prev().text(value);
            } 
            else if (count > 1) {
                $(this).parents('.dropdown-menu').prev().text('Selected');
            }
            else {
                $(this).parents('.dropdown-menu').prev().text('Select');
            }
        });
    </script>

@endpush