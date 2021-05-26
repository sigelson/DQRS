@extends('layouts.appw', ['class' => 'bg-lighter'])
@section('content')
    <div class="header bg-gradient-lighter py-3">
        <div class="container">

            <div class="row">
                <div class="col-sm-12">
                    {{-- <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" class="img img-fluid w-25" alt="..."> --}}
                </div>
                <div class="col-sm-12">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <img src="{{ asset('assets/argon') }}/img/brand/logo-red.png" class="img img-fluid w-25" alt="...">
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{url('/')}}" class="btn btn-md btn-dark">{{ __('Go Back') }}</a>
                                </div>
                            </div>
                        </div>
                        <main>
                        <div class="card-body">
                            <form method="post" action="{{ route('queues.store') }}" autocomplete="off">
                                {{ csrf_field() }}

                                <h6 class="heading-small text-muted mb-4">{{ __('Queue Fill-up form') }}</h6>
                                <div class="pl-lg-4">

                                    <div class="form-group{{ $errors->has('department') ? ' has-danger' : '' }} text-center">
                                        <div class="col">
                                        <label  class="form-control-label text-lg" for="input-department">{{ __('Choose Department') }}</label>

                                    </div>

                                            <div class="col text-center" data-toggle="buttons">
                                                <div class="row text-center">
                                                    @foreach ($departments as $department)
                                                    <div class=" btn-group-toggle col-sm-12 col-md-4 text-center mt-2">
                                                        <label @click="setDropdown('{{$department->name}}')" class="btn btn-default btn-lg w-100 text-uppercase" onclick="getdept({{$department}})">
                                                            <input type="radio" name="department" value="{{ $department->name}}" sr-only required> {{ $department->name}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>

                                        @if ($errors->has('department'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('department') }}</strong>
                                            </span>
                                        @endif
                                    </div>

                                </div>
                                <div class="mb-2">
                                    <span class="text-left text-red">* Required</span>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8 form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}<span class="text-red"> *</span></label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('snumber') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-snumber">{{ __('Student number') }}</label>
                                            <input type="number" name="snumber" id="input-snumber" class="form-control form-control-alternative{{ $errors->has('snumber') ? ' is-invalid' : '' }}" placeholder="{{ __('Student number') }}" value="{{ old('snumber') }}" autofocus>

                                            @if ($errors->has('snumber'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>student number must be numeric and exactly 8 numbers.</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" autofocus>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('mobile') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-mobile">{{ __('Mobile number') }}</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                  <div class="input-group-text">+63</div>
                                                </div>
                                                <input type="number" name="mobile" id="input-mobile" class="form-control{{ $errors->has('mobile') ? ' is-invalid' : '' }}" placeholder="{{ __('Ex. 9151234567') }}" value="{{ old('mobile') }}" autofocus>
                                                @if ($errors->has('mobile'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>mobile number must be numeric and exactly 10 numbers. Ex: 9151234567</strong>
                                                </span>
                                                @endif
                                              </div>
                                        </div>

                                        <div class="col-sm-12 col-md-4 form-group{{ $errors->has('transaction') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-transaction">{{ __('Transaction') }}</label>
                                            <select class="form-control form-control-md" v-if="dropdown.length" v-model="selected" name="transaction" required>
                                                {{-- <option hidden value="">Choose Transaction...</option> --}}
                                                <option v-for="item in dropdown" :value="item">@{{ item }}</option>
                                                {{-- @foreach ($transactions as $transaction)
                                            <option>{{$transaction->name}}</option>
                                            @endforeach --}}

                                            <option>Other</option>
                                            </select>
                                            @if ($errors->has('transaction'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('transaction') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="col-sm-12 form-group{{ $errors->has('remarks') ? ' has-danger' : '' }}">
                                            <label class="form-control-label" for="input-remarks">{{ __('Notes / Remarks') }}</label>
                                            <input type="text" name="remarks" id="input-remarks" class="form-control form-control-alternative{{ $errors->has('remarks') ? ' is-invalid' : '' }}" placeholder="{{ __('Notes / Remarks for the transaction...') }}" value="{{ old('remarks') }}" autofocus>

                                            @if ($errors->has('remarks'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('remarks') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                    </div>

                                    <input type="hidden" name="letter" id="letter" value="">
                                    {{-- <input type="hidden" name="number" id="number" value=""> --}}

                                    <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck6" type="checkbox" required>
                                        <label class="custom-control-label font-weight-bold" for="customCheck6">I confirm that the information given in this form is true, complete and accurate.</label>
                                      </div>

                                      <div class="custom-control custom-control-alternative custom-checkbox mb-3">
                                        <input class="custom-control-input" id="customCheck7" type="checkbox" required>
                                        <label class="custom-control-label font-weight-bold" for="customCheck7">By checking the box and clicking the submit button, I agree to the system's <a class="text-info text-bold" href="https://www.stdominiccollege.edu.ph/index.php/data-privacy" target='_blank'>Privacy Policy.</a></label>
                                      </div>

                                      <!-- Modal -->
                                    <div class="modal fade" id="policyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">DQRS Privacy Policy</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <h1>DQRS Privacy Policy</h1>
                                                <p class="text-muted">Last updated: April 21, 2021</p>
                                                <p>This Privacy Policy describes Our policies and procedures on the collection, use and disclosure of Your information when You use the Service and tells You about Your privacy rights and how the law protects You.</p>
                                                <p>We use Your Personal data to provide and improve the Service. By using the Service, You agree to the collection and use of information in accordance with this Privacy Policy.</p>
                                                <h1>Interpretation and Definitions</h1>
                                                <h2>Interpretation</h2>
                                                <p>The words of which the initial letter is capitalized have meanings defined under the following conditions. The following definitions shall have the same meaning regardless of whether they appear in singular or in plural.</p>
                                                <h2>Definitions</h2>
                                                <p>For the purposes of this Privacy Policy:</p>
                                                <ul>
                                                <li>
                                                <p><strong>Account</strong> means a unique account created for You to access our Service or parts of our Service.</p>
                                                </li>
                                                <li>
                                                <p><strong>Company</strong> (referred to as either &quot;the Company&quot;, &quot;We&quot;, &quot;Us&quot; or &quot;Our&quot; in this Agreement) refers to Dominican Queue Reservation System.</p>
                                                </li>
                                                <li>
                                                <p><strong>Cookies</strong> are small files that are placed on Your computer, mobile device or any other device by a website, containing the details of Your browsing history on that website among its many uses.</p>
                                                </li>
                                                <li>
                                                <p><strong>Country</strong> refers to:  Philippines</p>
                                                </li>
                                                <li>
                                                <p><strong>Device</strong> means any device that can access the Service such as a computer, a cellphone or a digital tablet.</p>
                                                </li>
                                                <li>
                                                <p><strong>Personal Data</strong> is any information that relates to an identified or identifiable individual.</p>
                                                </li>
                                                <li>
                                                <p><strong>Service</strong> refers to the Website.</p>
                                                </li>
                                                <li>
                                                <p><strong>Service Provider</strong> means any natural or legal person who processes the data on behalf of the Company. It refers to third-party companies or individuals employed by the Company to facilitate the Service, to provide the Service on behalf of the Company, to perform services related to the Service or to assist the Company in analyzing how the Service is used.</p>
                                                </li>
                                                <li>
                                                <p><strong>Third-party Social Media Service</strong> refers to any website or any social network website through which a User can log in or create an account to use the Service.</p>
                                                </li>
                                                <li>
                                                <p><strong>Usage Data</strong> refers to data collected automatically, either generated by the use of the Service or from the Service infrastructure itself (for example, the duration of a page visit).</p>
                                                </li>
                                                <li>
                                                <p><strong>Website</strong> refers to Dominican Queue Reservation System, accessible from <a href="stdominiccollegeofasia.edu.ph" rel="external nofollow noopener" target="_blank">stdominiccollegeofasia.edu.ph</a></p>
                                                </li>
                                                <li>
                                                <p><strong>You</strong> means the individual accessing or using the Service, or the company, or other legal entity on behalf of which such individual is accessing or using the Service, as applicable.</p>
                                                </li>
                                                </ul>
                                                <h1>Collecting and Using Your Personal Data</h1>
                                                <h2>Types of Data Collected</h2>
                                                <h3>Personal Data</h3>
                                                <p>While using Our Service, We may ask You to provide Us with certain personally identifiable information that can be used to contact or identify You. Personally identifiable information may include, but is not limited to:</p>
                                                <ul>
                                                <li>
                                                <p>Email address</p>
                                                </li>
                                                <li>
                                                <p>First name and last name</p>
                                                </li>
                                                <li>
                                                <p>Student number</p>
                                                </li>
                                                <li>
                                                <p>Phone number</p>
                                                </li>
                                                <li>
                                                <p>Usage Data</p>
                                                </li>
                                                </ul>
                                                <h3>Usage Data</h3>
                                                <p>Usage Data is collected automatically when using the Service.</p>
                                                <p>Usage Data may include information such as Your Device's Internet Protocol address (e.g. IP address), browser type, browser version, the pages of our Service that You visit, the time and date of Your visit, the time spent on those pages, unique device identifiers and other diagnostic data.</p>
                                                <p>When You access the Service by or through a mobile device, We may collect certain information automatically, including, but not limited to, the type of mobile device You use, Your mobile device unique ID, the IP address of Your mobile device, Your mobile operating system, the type of mobile Internet browser You use, unique device identifiers and other diagnostic data.</p>
                                                <p>We may also collect information that Your browser sends whenever You visit our Service or when You access the Service by or through a mobile device.</p>
                                                <h3>Tracking Technologies and Cookies</h3>
                                                <p>We use Cookies and similar tracking technologies to track the activity on Our Service and store certain information. Tracking technologies used are beacons, tags, and scripts to collect and track information and to improve and analyze Our Service. The technologies We use may include:</p>
                                                <ul>
                                                <li><strong>Cookies or Browser Cookies.</strong> A cookie is a small file placed on Your Device. You can instruct Your browser to refuse all Cookies or to indicate when a Cookie is being sent. However, if You do not accept Cookies, You may not be able to use some parts of our Service. Unless you have adjusted Your browser setting so that it will refuse Cookies, our Service may use Cookies.</li>
                                                <li><strong>Flash Cookies.</strong> Certain features of our Service may use local stored objects (or Flash Cookies) to collect and store information about Your preferences or Your activity on our Service. Flash Cookies are not managed by the same browser settings as those used for Browser Cookies. For more information on how You can delete Flash Cookies, please read &quot;Where can I change the settings for disabling, or deleting local shared objects?&quot; available at <a href="https://helpx.adobe.com/flash-player/kb/disable-local-shared-objects-flash.html#main_Where_can_I_change_the_settings_for_disabling__or_deleting_local_shared_objects_" rel="external nofollow noopener" target="_blank">https://helpx.adobe.com/flash-player/kb/disable-local-shared-objects-flash.html#main_Where_can_I_change_the_settings_for_disabling__or_deleting_local_shared_objects_</a></li>
                                                <li><strong>Web Beacons.</strong> Certain sections of our Service and our emails may contain small electronic files known as web beacons (also referred to as clear gifs, pixel tags, and single-pixel gifs) that permit the Company, for example, to count users who have visited those pages or opened an email and for other related website statistics (for example, recording the popularity of a certain section and verifying system and server integrity).</li>
                                                </ul>
                                                <p>Cookies can be &quot;Persistent&quot; or &quot;Session&quot; Cookies. Persistent Cookies remain on Your personal computer or mobile device when You go offline, while Session Cookies are deleted as soon as You close Your web browser. You can learn more about cookies here: <a href="https://www.termsfeed.com/blog/cookies/" target="_blank">All About Cookies by TermsFeed</a>.</p>
                                                <p>We use both Session and Persistent Cookies for the purposes set out below:</p>
                                                <ul>
                                                <li>
                                                <p><strong>Necessary / Essential Cookies</strong></p>
                                                <p>Type: Session Cookies</p>
                                                <p>Administered by: Us</p>
                                                <p>Purpose: These Cookies are essential to provide You with services available through the Website and to enable You to use some of its features. They help to authenticate users and prevent fraudulent use of user accounts. Without these Cookies, the services that You have asked for cannot be provided, and We only use these Cookies to provide You with those services.</p>
                                                </li>
                                                <li>
                                                <p><strong>Cookies Policy / Notice Acceptance Cookies</strong></p>
                                                <p>Type: Persistent Cookies</p>
                                                <p>Administered by: Us</p>
                                                <p>Purpose: These Cookies identify if users have accepted the use of cookies on the Website.</p>
                                                </li>
                                                <li>
                                                <p><strong>Functionality Cookies</strong></p>
                                                <p>Type: Persistent Cookies</p>
                                                <p>Administered by: Us</p>
                                                <p>Purpose: These Cookies allow us to remember choices You make when You use the Website, such as remembering your login details or language preference. The purpose of these Cookies is to provide You with a more personal experience and to avoid You having to re-enter your preferences every time You use the Website.</p>
                                                </li>
                                                </ul>
                                                <p>For more information about the cookies we use and your choices regarding cookies, please visit our Cookies Policy or the Cookies section of our Privacy Policy.</p>
                                                <h2>Use of Your Personal Data</h2>
                                                <p>The Company may use Personal Data for the following purposes:</p>
                                                <ul>
                                                <li>
                                                <p><strong>To provide and maintain our Service</strong>, including to monitor the usage of our Service.</p>
                                                </li>
                                                <li>
                                                <p><strong>To manage Your Account:</strong> to manage Your registration as a user of the Service. The Personal Data You provide can give You access to different functionalities of the Service that are available to You as a registered user.</p>
                                                </li>
                                                <li>
                                                <p><strong>For the performance of a contract:</strong> the development, compliance and undertaking of the purchase contract for the products, items or services You have purchased or of any other contract with Us through the Service.</p>
                                                </li>
                                                <li>
                                                <p><strong>To contact You:</strong> To contact You by email, telephone calls, SMS, or other equivalent forms of electronic communication, such as a mobile application's push notifications regarding updates or informative communications related to the functionalities, products or contracted services, including the security updates, when necessary or reasonable for their implementation.</p>
                                                </li>
                                                <li>
                                                <p><strong>To provide You</strong> with news, special offers and general information about other goods, services and events which we offer that are similar to those that you have already purchased or enquired about unless You have opted not to receive such information.</p>
                                                </li>
                                                <li>
                                                <p><strong>To manage Your requests:</strong> To attend and manage Your requests to Us.</p>
                                                </li>
                                                <li>
                                                <p><strong>For business transfers:</strong> We may use Your information to evaluate or conduct a merger, divestiture, restructuring, reorganization, dissolution, or other sale or transfer of some or all of Our assets, whether as a going concern or as part of bankruptcy, liquidation, or similar proceeding, in which Personal Data held by Us about our Service users is among the assets transferred.</p>
                                                </li>
                                                <li>
                                                <p><strong>For other purposes</strong>: We may use Your information for other purposes, such as data analysis, identifying usage trends, determining the effectiveness of our promotional campaigns and to evaluate and improve our Service, products, services, marketing and your experience.</p>
                                                </li>
                                                </ul>
                                                <p>We may share Your personal information in the following situations:</p>
                                                <ul>
                                                <li><strong>With Service Providers:</strong> We may share Your personal information with Service Providers to monitor and analyze the use of our Service,  to contact You.</li>
                                                <li><strong>For business transfers:</strong> We may share or transfer Your personal information in connection with, or during negotiations of, any merger, sale of Company assets, financing, or acquisition of all or a portion of Our business to another company.</li>
                                                <li><strong>With Affiliates:</strong> We may share Your information with Our affiliates, in which case we will require those affiliates to honor this Privacy Policy. Affiliates include Our parent company and any other subsidiaries, joint venture partners or other companies that We control or that are under common control with Us.</li>
                                                <li><strong>With business partners:</strong> We may share Your information with Our business partners to offer You certain products, services or promotions.</li>
                                                <li><strong>With other users:</strong> when You share personal information or otherwise interact in the public areas with other users, such information may be viewed by all users and may be publicly distributed outside. If You interact with other users or register through a Third-Party Social Media Service, Your contacts on the Third-Party Social Media Service may see Your name, profile, pictures and description of Your activity. Similarly, other users will be able to view descriptions of Your activity, communicate with You and view Your profile.</li>
                                                <li><strong>With Your consent</strong>: We may disclose Your personal information for any other purpose with Your consent.</li>
                                                </ul>
                                                <h2>Retention of Your Personal Data</h2>
                                                <p>The Company will retain Your Personal Data only for as long as is necessary for the purposes set out in this Privacy Policy. We will retain and use Your Personal Data to the extent necessary to comply with our legal obligations (for example, if we are required to retain your data to comply with applicable laws), resolve disputes, and enforce our legal agreements and policies.</p>
                                                <p>The Company will also retain Usage Data for internal analysis purposes. Usage Data is generally retained for a shorter period of time, except when this data is used to strengthen the security or to improve the functionality of Our Service, or We are legally obligated to retain this data for longer time periods.</p>
                                                <h2>Transfer of Your Personal Data</h2>
                                                <p>Your information, including Personal Data, is processed at the Company's operating offices and in any other places where the parties involved in the processing are located. It means that this information may be transferred to — and maintained on — computers located outside of Your state, province, country or other governmental jurisdiction where the data protection laws may differ than those from Your jurisdiction.</p>
                                                <p>Your consent to this Privacy Policy followed by Your submission of such information represents Your agreement to that transfer.</p>
                                                <p>The Company will take all steps reasonably necessary to ensure that Your data is treated securely and in accordance with this Privacy Policy and no transfer of Your Personal Data will take place to an organization or a country unless there are adequate controls in place including the security of Your data and other personal information.</p>
                                                <h2>Disclosure of Your Personal Data</h2>
                                                <h3>Business Transactions</h3>
                                                <p>If the Company is involved in a merger, acquisition or asset sale, Your Personal Data may be transferred. We will provide notice before Your Personal Data is transferred and becomes subject to a different Privacy Policy.</p>
                                                <h3>Law enforcement</h3>
                                                <p>Under certain circumstances, the Company may be required to disclose Your Personal Data if required to do so by law or in response to valid requests by public authorities (e.g. a court or a government agency).</p>
                                                <h3>Other legal requirements</h3>
                                                <p>The Company may disclose Your Personal Data in the good faith belief that such action is necessary to:</p>
                                                <ul>
                                                <li>Comply with a legal obligation</li>
                                                <li>Protect and defend the rights or property of the Company</li>
                                                <li>Prevent or investigate possible wrongdoing in connection with the Service</li>
                                                <li>Protect the personal safety of Users of the Service or the public</li>
                                                <li>Protect against legal liability</li>
                                                </ul>
                                                <h2>Security of Your Personal Data</h2>
                                                <p>The security of Your Personal Data is important to Us, but remember that no method of transmission over the Internet, or method of electronic storage is 100% secure. While We strive to use commercially acceptable means to protect Your Personal Data, We cannot guarantee its absolute security.</p>
                                                <h1>Children's Privacy</h1>
                                                <p>Our Service does not address anyone under the age of 13. We do not knowingly collect personally identifiable information from anyone under the age of 13. If You are a parent or guardian and You are aware that Your child has provided Us with Personal Data, please contact Us. If We become aware that We have collected Personal Data from anyone under the age of 13 without verification of parental consent, We take steps to remove that information from Our servers.</p>
                                                <p>If We need to rely on consent as a legal basis for processing Your information and Your country requires consent from a parent, We may require Your parent's consent before We collect and use that information.</p>
                                                <h1>Links to Other Websites</h1>
                                                <p>Our Service may contain links to other websites that are not operated by Us. If You click on a third party link, You will be directed to that third party's site. We strongly advise You to review the Privacy Policy of every site You visit.</p>
                                                <p>We have no control over and assume no responsibility for the content, privacy policies or practices of any third party sites or services.</p>
                                                <h1>Changes to this Privacy Policy</h1>
                                                <p>We may update Our Privacy Policy from time to time. We will notify You of any changes by posting the new Privacy Policy on this page.</p>
                                                <p>We will let You know via email and/or a prominent notice on Our Service, prior to the change becoming effective and update the &quot;Last updated&quot; date at the top of this Privacy Policy.</p>
                                                <p>You are advised to review this Privacy Policy periodically for any changes. Changes to this Privacy Policy are effective when they are posted on this page.</p>
                                                <h1>Contact Us</h1>
                                                <p>If you have any questions about this Privacy Policy, You can contact us:</p>
                                                <ul>
                                                <li>By email: dqrshelper@gmail.com</li>
                                                </ul>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    {{-- End Modal --}}



                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Submit') }}</button>
                                    </div>

                                    <input type="hidden" name="is_priority" id="prio" value="0">
                                </div>
                            </form>
                        </div>
                            <div class="modal fade bd-example-modal-sm" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-sm" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                                    </div>
                                    <div class="modal-body">
                                     <h2>Are you a PWD or Senior Citizen?</h2>
                                     <br><br>
                                    <h3 text-info>Reminder:</h3>
                                    <p>Please present your ID or any document that will serve as proof for verification.</p>

                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" @click="isPrio(0)">NO</button>
                                      <button type="button" class="btn btn-info" @click="isPrio(1)">YES</button>
                                    </div>
                                  </div>
                                </div>
                            </div>
                    </main>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <div class="container static-bottom py-3">
        @include('layouts.footers.nav')
    </div>

@endsection

@push('js')

<script>




    function getdept(dept) {
        document.getElementById('letter').value = dept.letter;
    }
</script>
<script>
    const app = new Vue({
        el:'main',
        data:{
            dropdown: [],
            selected: null,
            trans:{
//                     accounting: [
//                         {id: 1, name: 'Statement of Account'},
//                         {id: 2, name: 'Examination Permit	'},
//                         {id: 3, name: 'Payment Breakdown'}

//                     ],
//                     registrar: [
//                         {id: 1, name: 'Request document'},
//                         {id: 2, name: 'Claim a document'}

//                     ],
//                     cashier: [
//                         {id: 1, name: 'Tuition Fee'},
//                         {id: 2, name: 'Miscellaneous Fee'},
//                         {id: 3, name: 'Business Centre'}


//   ]
}

        },
        mounted(){
            this.getTrans();

            // $('#confirmModal').modal({
            //     backdrop: 'static',
            //     keyboard: false
            // });
            $('#confirmModal').modal({
        backdrop: 'static',
        keyboard: false
    });
        },
        methods:{
            getTrans(){
                axios.get('create/transactions')
                .then((response)=>{
                    this.trans=response.data
                })

                .catch(function (error){
                    console.log(error);
                });
            },
            setDropdown: function (type) {
                        this.selected = null;
                        this.dropdown = this.trans[type];
                        console.log(type)
                        },

                        isPrio(value) {
        document.getElementById('prio').value = value;
        $('#confirmModal').modal('hide');
    }

        }
    })
</script>
@endpush

