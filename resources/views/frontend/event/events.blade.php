@extends('frontend.layouts.app')

@section('title', 'Proxima Study | Events')

@push('after-styles')
    <link href="{{ url('css/events.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container inner-parent" style="margin-top: 5rem; margin-bottom: 3rem;">
        <h4 class="fw-bolder futura">Events</h4>

        <div class="row align-items-center mb-4 mb-md-0">
            <div class="col-12 col-md-9 col-lg-10 pe-3 pe-md-0">
                <hr>
            </div>
            <div class="col-12 col-md-3 col-lg-2 text-end ps-0">
                @auth
                    <button class="btn text-white post-btn" data-bs-toggle="modal" data-bs-target="#post-event">Post your event</button>
                @else
                    <a href="{{ route('frontend.auth.login') }}" type="button" class="btn text-white post-btn">Post your event</a>
                @endauth
            </div>
        </div>
    </div>


    <div class="container events" style="margin-bottom: 5rem;">
        @if(count($events) == 0)
            @include('frontend.includes.not_found_title',[
                'not_found_title' => 'Events not found',
                'not_found_description' => 'If you want you can post your event here.'
            ])
        @else
            @foreach($events as $event)
                <div class="px-3">
                    <div class="row justify-content-between border py-3 px-2 mb-5 align-items-center">
                        <div class="col-12 col-md-5 mb-3 mb-md-0">

                            @if($event->image != null)
                                <img src="{{ url('images/events', $event->image) }}" alt="" class="img-fluid" style="height: 15rem; object-fit: cover;">
                            @else
                                <img src="{{ url('img/frontend/no_image.jpg') }}" alt="" class="img-fluid w-100" style="height: 15rem; object-fit: cover;">
                            @endif

                        </div>

                        <div class="col-12 col-md-7">
                            <div class="row align-items-center mb-2">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="fw-bold">Title</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <p class="fw-bold">:</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <h6 class="fw-bolder">{{ $event->title }}</h6>
                                </div>
                            </div>

                            <div class="row align-items-center mb-2">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="fw-bold">Type</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <p class="fw-bold">:</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="gray">{{ $event->type }}</p>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="fw-bold">Date</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <p class="fw-bold">:</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="gray">{{ $event->date }}</p>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="fw-bold">Time</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <p class="fw-bold">:</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="gray">{{ $event->time }}</p>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="fw-bold">City</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <p class="fw-bold">:</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="gray">{{ $event->city }}</p>
                                </div>
                            </div>

                            <div class="row mb-2">
                                <div class="col-4">
                                    <div class="row">
                                        <div class="col-10">
                                            <p class="fw-bold">Country</p>
                                        </div>
                                        <div class="col-1 p-0">
                                            <p class="fw-bold">:</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <p class="gray">{{ $event->country }}</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 text-end">
                                    <a href="{{ route('frontend.single_event', $event->id) }}" class="btn btn-primary px-4" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Read more</a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach

            {{ $events->links() }}
        @endif
    </div>


    <!-- Modal -->
    <form action="{{ route('frontend.event_request') }}" method="POST" enctype="multipart/form-data" novalidate>
    {{csrf_field()}}
        <div class="modal fade" id="post-event" tabindex="-1" aria-labelledby="post-quote-label" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Event submission form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="text-end">
                            <p class="mb-2 required fw-bold">* Indicates required fields</p>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" id="title" aria-describedby="title" placeholder="Event title *" name="title" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="description" class="form-control" rows="7" placeholder="Description *" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="city" aria-describedby="city" placeholder="City *" name="city" required>
                                </div>
                                <div class="col-6">
                                    <select class="form-select form-control" id="country" name="country" required>
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
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <input type="date" class="form-control" id="date" aria-describedby="date" placeholder="Event date *" name="date" required>
                                </div>
                                <div class="col-6">
                                    <input type="time" class="form-control" id="time" aria-describedby="time" placeholder="Event time *" name="time" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <input type="text" class="form-control" id="type" aria-describedby="type" placeholder="Event type *" name="type" required>
                                </div>
                                <div class="col-6">
                                    <input type="url" class="form-control" id="url" aria-describedby="url" placeholder="Event URL" name="url">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="row">
                                <div class="col-6">
                                    <input type="email" class="form-control" id="email" aria-describedby="email" placeholder="Event organizer email *" name="email" required>
                                </div>
                                <div class="col-6">
                                    <input type="text" class="form-control" id="phone" aria-describedby="phone" placeholder="Event organizer phone *" name="phone" required>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 form-group">
                            <label for="image" class="form-label">Event banner image * (Files must be less than 5MB, allowed file types: png, gif, jpg, jpeg)</label>
                            <input type="file" class="form-control" id="image" name="image" required>
                        </div>

                        <div class="row mb-2 justify-content-center">
                            <div class="col-md-6 text-center">
                                <div class="g-recaptcha" data-callback="checked" data-sitekey="6Lel4Z4UAAAAAOa8LO1Q9mqKRUiMYl_00o5mXJrR"></div>
                            </div>
                        </div>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <button type="button" class="btn text-white w-25" data-bs-dismiss="modal" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Close</button>
                        <button type="submit" class="btn text-white w-25" id="submit_btn" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;" disabled>Submit</button>
                    </div>

                </div>
            </div>
        </div>
    </form>


    @if(\Session::has('success'))

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary invisible" id="modal-btn" data-bs-toggle="modal" data-bs-target="#exampleModal"></button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content">

                    <div class="modal-body" style="padding: 3rem 1rem;">
                        <h4 class="mb-0 text-center">Thank you for your event submission. It will appear here once we approved.</h4>
                    </div>

                    <div class="modal-footer justify-content-center">
                        <a href="{{ route('frontend.events') }}" class="btn text-white w-25" style="background-image: -webkit-linear-gradient(top, #CF0411, #660000); border: none;">Refresh</a>
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
        if(document.getElementById("modal-btn")){
            $('#modal-btn').click();
        }
    </script>
@endpush
