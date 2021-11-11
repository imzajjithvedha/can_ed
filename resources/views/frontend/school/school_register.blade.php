@extends('frontend.layouts.app')

@section('title', 'School Registration Request')

@push('after-styles')
    <link href="{{ url('css/schools.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container school-register" style="margin-top: 5rem; margin-bottom: 5rem;">
        <h5 class="fw-bolder">School registration request</h5>
        <hr>

        <form class="mt-5" action="{{ route('frontend.school_register_request') }}" method="POST">
            {{csrf_field()}}
            <div class="row justify-content-center">
                <div class="col-6">
                    <div class="text-end">
                        <p class="mb-2 required fw-bold">* Indicates required fields</p>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="name" aria-describedby="name" placeholder="Enter your school name *" name="name" required>
                    </div>
                    <div class="mb-3">
                        <input type="url" class="form-control" id="website" aria-describedby="website" placeholder="Enter your school website *" name="website" required>
                    </div>
                    <div class="mb-3">
                        <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Enter your email address *" name="email" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Enter your phone number *" name="phone" required>
                    </div>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-8 pe-0">
                                <input type="text" class="form-control" id="reach_time" aria-describedby="name" placeholder="Best time to reach you HH:MM (eg. 15:30)" name="reach_time" required>
                            </div>
                            <div class="col-4 ps-1">
                                <select class="form-control" id="timezone" name="time_zone" required>
                                    <option value="" selected disabled hidden>Time zone *</option>
                                    <option value="GMT-10:00">(GMT-10:00) Hawaii</option>
                                    <option>(GMT-09:00) Alaska</option>
                                    <option>(GMT-08:00) Pacific Time (US &amp; Canada)</option>
                                    <option>(GMT-07:00) Arizona</option>
                                    <option>(GMT-07:00) Mountain Time (US &amp; Canada)</option>
                                    <option>(GMT-06:00) Central Time (US &amp; Canada)</option>
                                    <option>(GMT-05:00) Eastern Time (US &amp; Canada)</option>
                                    <option>(GMT-11:00) International Date Line West</option>
                                    <option>(GMT-11:00) Midway Island</option>
                                    <option>(GMT-11:00) Samoa</option>
                                    <option>(GMT-08:00) Tijuana</option>
                                    <option>(GMT-07:00) Chihuahua</option>
                                    <option>(GMT-07:00) Mazatlan</option>
                                    <option>(GMT-06:00) Central America</option>
                                    <option>(GMT-06:00) Guadalajara</option>
                                    <option>(GMT-06:00) Mexico City</option>
                                    <option>(GMT-06:00) Monterrey</option>
                                    <option>(GMT-06:00) Saskatchewan</option>
                                    <option>(GMT-05:00) Bogota</option>
                                    <option>(GMT-05:00) Lima</option>
                                    <option>(GMT-05:00) Quito</option>
                                    <option>(GMT-04:30) Caracas</option>
                                    <option>(GMT-04:00) Atlantic Time (Canada)</option>
                                    <option>(GMT-04:00) La Paz</option>
                                    <option>(GMT-04:00) Santiago</option>
                                    <option>(GMT-03:30) Newfoundland</option>
                                    <option>(GMT-03:00) Brasilia</option>
                                    <option>(GMT-03:00) Buenos Aires</option>
                                    <option>(GMT-03:00) Georgetown</option>
                                    <option>(GMT-03:00) Greenland</option>
                                    <option>(GMT-02:00) Mid-Atlantic</option>
                                    <option>(GMT-01:00) Azores</option>
                                    <option>(GMT-01:00) Cape Verde Is.</option>
                                    <option>(GMT) Casablanca</option>
                                    <option>(GMT) Dublin</option>
                                    <option>(GMT) Edinburgh</option>
                                    <option>(GMT) Lisbon</option>
                                    <option>(GMT) London</option>
                                    <option>(GMT) Monrovia</option>
                                    <option>(GMT+01:00) Amsterdam</option>
                                    <option>(GMT+01:00) Belgrade</option>
                                    <option>(GMT+01:00) Berlin</option>
                                    <option>(GMT+01:00) Bern</option>
                                    <option>(GMT+01:00) Bratislava</option>
                                    <option>(GMT+01:00) Brussels</option>
                                    <option>(GMT+01:00) Budapest</option>
                                    <option>(GMT+01:00) Copenhagen</option>
                                    <option>(GMT+01:00) Ljubljana</option>
                                    <option>(GMT+01:00) Madrid</option>
                                    <option>(GMT+01:00) Paris</option>
                                    <option>(GMT+01:00) Prague</option>
                                    <option>(GMT+01:00) Rome</option>
                                    <option>(GMT+01:00) Sarajevo</option>
                                    <option>(GMT+01:00) Skopje</option>
                                    <option>(GMT+01:00) Stockholm</option>
                                    <option>(GMT+01:00) Vienna</option>
                                    <option>(GMT+01:00) Warsaw</option>
                                    <option>(GMT+01:00) West Central Africa</option>
                                    <option>(GMT+01:00) Zagreb</option>
                                    <option>(GMT+02:00) Athens</option>
                                    <option>(GMT+02:00) Bucharest</option>
                                    <option>(GMT+02:00) Cairo</option>
                                    <option>(GMT+02:00) Harare</option>
                                    <option>(GMT+02:00) Helsinki</option>
                                    <option>(GMT+02:00) Istanbul</option>
                                    <option>(GMT+02:00) Jerusalem</option>
                                    <option>(GMT+02:00) Kyiv</option>
                                    <option>(GMT+02:00) Minsk</option>
                                    <option>(GMT+02:00) Pretoria</option>
                                    <option>(GMT+02:00) Riga</option>
                                    <option>(GMT+02:00) Sofia</option>
                                    <option>(GMT+02:00) Tallinn</option>
                                    <option>(GMT+02:00) Vilnius</option>
                                    <option>(GMT+03:00) Baghdad</option>
                                    <option>(GMT+03:00) Kuwait</option>
                                    <option>(GMT+03:00) Moscow</option>
                                    <option>(GMT+03:00) Nairobi</option>
                                    <option>(GMT+03:00) Riyadh</option>
                                    <option>(GMT+03:00) St. Petersburg</option>
                                    <option>(GMT+03:00) Volgograd</option>
                                    <option>(GMT+03:30) Tehran</option>
                                    <option>(GMT+04:00) Abu Dhabi</option>
                                    <option>(GMT+04:00) Baku</option>
                                    <option>(GMT+04:00) Muscat</option>
                                    <option>(GMT+04:00) Tbilisi</option>
                                    <option>(GMT+04:00) Yerevan</option>
                                    <option>(GMT+04:30) Kabul</option>
                                    <option>(GMT+05:00) Ekaterinburg</option>
                                    <option>(GMT+05:00) Islamabad</option>
                                    <option>(GMT+05:00) Karachi</option>
                                    <option>(GMT+05:00) Tashkent</option>
                                    <option>(GMT+05:30) Chennai</option>
                                    <option>(GMT+05:30) Kolkata</option>
                                    <option>(GMT+05:30) Mumbai</option>
                                    <option>(GMT+05:30) New Delhi</option>
                                    <option>(GMT+05:45) Kathmandu</option>
                                    <option>(GMT+06:00) Almaty</option>
                                    <option>(GMT+06:00) Astana</option>
                                    <option>(GMT+06:00) Dhaka</option>
                                    <option>(GMT+06:00) Novosibirsk</option>
                                    <option>(GMT+06:00) Sri Jayawardenepura</option>
                                    <option>(GMT+06:30) Rangoon</option>
                                    <option>(GMT+07:00) Bangkok</option>
                                    <option>(GMT+07:00) Hanoi</option>
                                    <option>(GMT+07:00) Jakarta</option>
                                    <option>(GMT+07:00) Krasnoyarsk</option>
                                    <option>(GMT+08:00) Beijing</option>
                                    <option>(GMT+08:00) Chongqing</option>
                                    <option>(GMT+08:00) Hong Kong</option>
                                    <option>(GMT+08:00) Irkutsk</option>
                                    <option>(GMT+08:00) Kuala Lumpur</option>
                                    <option>(GMT+08:00) Perth</option>
                                    <option>(GMT+08:00) Singapore</option>
                                    <option>(GMT+08:00) Taipei</option>
                                    <option>(GMT+08:00) Ulaan Bataar</option>
                                    <option>(GMT+08:00) Urumqi</option>
                                    <option>(GMT+09:00) Osaka</option>
                                    <option>(GMT+09:00) Sapporo</option>
                                    <option>(GMT+09:00) Seoul</option>
                                    <option>(GMT+09:00) Tokyo</option>
                                    <option>(GMT+09:00) Yakutsk</option>
                                    <option>(GMT+09:30) Adelaide</option>
                                    <option>(GMT+09:30) Darwin</option>
                                    <option>(GMT+10:00) Brisbane</option>
                                    <option>(GMT+10:00) Canberra</option>
                                    <option>(GMT+10:00) Guam</option>
                                    <option>(GMT+10:00) Hobart</option>
                                    <option>(GMT+10:00) Melbourne</option>
                                    <option>(GMT+10:00) Port Moresby</option>
                                    <option>(GMT+10:00) Sydney</option>
                                    <option>(GMT+10:00) Vladivostok</option>
                                    <option>(GMT+11:00) Magadan</option>
                                    <option>(GMT+11:00) New Caledonia</option>
                                    <option>(GMT+11:00) Solomon Is.</option>
                                    <option>(GMT+12:00) Auckland</option>
                                    <option>(GMT+12:00) Fiji</option>
                                    <option>(GMT+12:00) Kamchatka</option>
                                    <option>(GMT+12:00) Marshall Is.</option>
                                    <option>(GMT+12:00) Wellington</option>
                                    <option>(GMT+13:00) Nuku'alofa</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <select class="form-control" id="country" name="country" required>
                            <option value="" selected disabled hidden>Country *</option>
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
                    <div class="mb-3">
                        <textarea name="message" class="form-control" rows="7" placeholder="Would you like to tell us anything before we contact you? *"></textarea>
                    </div>
                    <div class="mb-3 border p-3">
                        <p class="gray fw-bold">Protecting your privacy is fundamental to our mission and business</p>
                        <p class="gray fw-bold">We never sell your data or information</p>
                        <p class="gray fw-bold">We never send you junk email</p>
                        <p class="gray fw-bold">We don't own the content you add to our website</p>
                    </div>

                    <!-- <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" required>
                        <label class="form-check-label gray" for="flexCheckDefault" style="font-size: 0.9rem;">
                            I agree to receive email from this school, study in canada and other partners according to the guidelines set out in our <a href="{{ route('frontend.privacy_policy') }}" style="color: #800000;">Privacy policy</a>.
                        </label>
                    </div> -->

                    <div class="row mb-4 justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary px-5 py-3 text-white" id="submit_btn" disabled>Submit</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


    @if(is_school_registered(auth()->user()->id) || \Session::has('warning'))
        <button type="button" class="btn btn-primary invisible" id="warning-btn" data-bs-toggle="modal" data-bs-target="#warningModal"></button>

        <div class="modal fade" id="warningModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  data-bs-backdrop="static" data-bs-keyboard="false">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-body" style="padding: 5rem 1rem;">
                        <h4 class="mb-0 text-center">You already requested or registered a school in our site. You can't register more than one school. If you want to add a new school please delete the old school from your dashboard or edit your school details. We are very sorry for the inconvenience.</h4>
                    </div>
                    <div class="modal-footer">
                        <a href="{{ route('frontend.index') }}" class="btn text-white" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Back</a>
                    </div>
                </div>
            </div>
        </div>
    @endif

@endsection


@push('after-scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

    <script>
        function checked() {
            $('#submit_btn').removeAttr('disabled');
        };
    </script>

    <script>
        if(document.getElementById("warning-btn")){
            $('#warning-btn').click();
        }
    </script>
@endpush
