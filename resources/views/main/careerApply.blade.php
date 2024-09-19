<x-layout.layout title="Career Apply" apply="true">
    <section class="hero  careerApply">
        <div class="container">
            <div class="row g-0 align-items-center justify-content-center">
                <div class="col-lg-12 text-center">
                    <div class="title-content">
                        <p class="desc">Apply now</p>
                        <h1 class="title">
                            <span>get a job today</span>
                        </h1>
                    </div>
                </div>
            </div>
            <div class="form-details">
                <div class="head-form">
                    <h2 class="title-form">Enter Details</h2>
                  <p>
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                  </p>
                </div>
                <form action="{{ route('home.careerStore') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="d-flex gap-4">
                        <div class=" w-100 position-relative inputContainer rounded-pill">
                            <svg class="icon-form" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 20C5.33579 17.5226 8.50702 16 12 16C15.493 16 18.6642 17.5226 21 20M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            <input type="text" class="form-control rounded-pill pe-3" id="firstName" name="firstName"
                                placeholder="First name">
                        </div>
                        <div class=" w-100 position-relative inputContainer rounded-pill">
                            <svg class="icon-form" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M3 20C5.33579 17.5226 8.50702 16 12 16C15.493 16 18.6642 17.5226 21 20M16.5 7.5C16.5 9.98528 14.4853 12 12 12C9.51472 12 7.5 9.98528 7.5 7.5C7.5 5.01472 9.51472 3 12 3C14.4853 3 16.5 5.01472 16.5 7.5Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            <input type="text" class="form-control rounded-pill pe-3" id="lastName" name="lastName"
                                placeholder="Last name">
                        </div>
                    </div>
                    <div class="d-flex gap-4">
                        <div class=" w-100 position-relative inputContainer rounded-pill">
                            <svg class="icon-form" width="22" height="18" viewBox="0 0 22 18" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1 4L9.16492 9.71544C9.82609 10.1783 10.1567 10.4097 10.5163 10.4993C10.8339 10.5785 11.1661 10.5785 11.4837 10.4993C11.8433 10.4097 12.1739 10.1783 12.8351 9.71544L21 4M5.8 17H16.2C17.8802 17 18.7202 17 19.362 16.673C19.9265 16.3854 20.3854 15.9265 20.673 15.362C21 14.7202 21 13.8802 21 12.2V5.8C21 4.11984 21 3.27976 20.673 2.63803C20.3854 2.07354 19.9265 1.6146 19.362 1.32698C18.7202 1 17.8802 1 16.2 1H5.8C4.11984 1 3.27976 1 2.63803 1.32698C2.07354 1.6146 1.6146 2.07354 1.32698 2.63803C1 3.27976 1 4.11984 1 5.8V12.2C1 13.8802 1 14.7202 1.32698 15.362C1.6146 15.9265 2.07354 16.3854 2.63803 16.673C3.27976 17 4.11984 17 5.8 17Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            <input type="email" class="form-control rounded-pill pe-3" id="email" name="email"
                                placeholder="Email">
                        </div>
                        <div class=" w-100 position-relative inputContainer rounded-pill">
                            <svg class="icon-form" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M20.9672 16.3674V19.3674C20.9683 19.6459 20.9113 19.9215 20.7997 20.1767C20.6882 20.4319 20.5245 20.661 20.3193 20.8492C20.1141 21.0375 19.8718 21.1808 19.608 21.2701C19.3441 21.3593 19.0646 21.3924 18.7872 21.3674C15.7101 21.033 12.7542 19.9815 10.1572 18.2974C7.74105 16.762 5.69255 14.7135 4.15722 12.2974C2.4672 9.68857 1.41546 6.71836 1.08722 3.62736C1.06223 3.35083 1.09509 3.07212 1.18372 2.80899C1.27234 2.54585 1.41479 2.30405 1.60198 2.09898C1.78918 1.89392 2.01702 1.73007 2.27101 1.61788C2.525 1.5057 2.79956 1.44762 3.07722 1.44736H6.07722C6.56252 1.44259 7.03301 1.61444 7.40098 1.9309C7.76895 2.24735 8.0093 2.68681 8.07722 3.16736C8.20384 4.12743 8.43867 5.07009 8.77722 5.97736C8.91176 6.33529 8.94088 6.72428 8.86112 7.09824C8.78137 7.47221 8.59608 7.81547 8.32722 8.08736L7.05722 9.35736C8.48077 11.8609 10.5537 13.9338 13.0572 15.3574L14.3272 14.0874C14.5991 13.8185 14.9424 13.6332 15.3163 13.5535C15.6903 13.4737 16.0793 13.5028 16.4372 13.6374C17.3445 13.9759 18.2872 14.2107 19.2472 14.3374C19.733 14.4059 20.1766 14.6506 20.4938 15.0249C20.8109 15.3991 20.9794 15.8769 20.9672 16.3674Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="text" class="form-control  pe-3" id="phone" name="phone"
                                placeholder="+20 000-000-0000">
                        </div>
                    </div>
                    <div class="d-flex gap-4">
                        <div class="position-relative inputContainer rounded-pill select">
                            <svg class="icon-form" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M1.5 10C4.33333 9.33335 9.2 8.9 8 12.5C6.5 17 7 16 8 18C8.8 19.6 8.33333 21.3333 8 22M5 4C6.5 3.66667 10 3.4 12 5C14.5 7 14 10 21 6.00001M23 12C23 18.0751 18.0751 23 12 23C5.92487 23 1 18.0751 1 12C1 5.92487 5.92487 1 12 1C18.0751 1 23 5.92487 23 12ZM14.3272 12.299C17.8272 11.799 19 11.5 18 14C17.0715 16.3212 14.3272 20.9657 12.3272 16.299C11.8272 15.1324 11.5272 12.699 14.3272 12.299Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                </path>
                            </svg>
                            <select name="country" id="country" class="w-100 pe-3 rounded-pill py-2">
                                <option value="">Country</option>
                                @php $countries = countries(); @endphp
                                @foreach ($countries as $country)
                                    <option value="{{ $country->code }}">{{ $country->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="position-relative
                      inputContainer rounded-pill select">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path
                                    d="M5 9.99958V16.0107C5 16.3697 5 16.5492 5.05465 16.7076C5.10299 16.8477 5.18187 16.9754 5.28558 17.0813C5.40287 17.201 5.5634 17.2813 5.88446 17.4418L11.2845 20.1418C11.5468 20.273 11.678 20.3386 11.8156 20.3644C11.9375 20.3873 12.0625 20.3873 12.1844 20.3644C12.322 20.3386 12.4532 20.273 12.7155 20.1418L18.1155 17.4418C18.4366 17.2813 18.5971 17.201 18.7144 17.0813C18.8181 16.9754 18.897 16.8477 18.9453 16.7076C19 16.5492 19 16.3697 19 16.0107V9.99958M2 8.49958L11.6422 3.67846C11.7734 3.61287 11.839 3.58008 11.9078 3.56717C11.9687 3.55574 12.0313 3.55574 12.0922 3.56717C12.161 3.58008 12.2266 3.61287 12.3578 3.67846L22 8.49958L12.3578 13.3207C12.2266 13.3863 12.161 13.4191 12.0922 13.432C12.0313 13.4434 11.9687 13.4434 11.9078 13.432C11.839 13.4191 11.7734 13.3863 11.6422 13.3207L2 8.49958Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <select name="edu" id="edu" class="w-100 pe-3 rounded-pill py-2">
                                <option value="">Education Level</option>
                                @foreach ($constants->where('type', 'edu_level') as $edu)
                                    <option value="{{ $edu->content }}">{{ $edu->content }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="d-flex
                   gap-4">
                        <div class="position-relative inputContainer rounded-pill select">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M8 8H6.2C5.0799 8 4.51984 8 4.09202 8.21799C3.71569 8.40973 3.40973 8.71569 3.21799 9.09202C3 9.51984 3 10.0799 3 11.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.0799 21 6.2 21H8M8 8H16M8 8V7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7V8M8 8V21M16 8H17.8C18.9201 8 19.4802 8 19.908 8.21799C20.2843 8.40973 20.5903 8.71569 20.782 9.09202C21 9.51984 21 10.0799 21 11.2V17.8C21 18.9201 21 19.4802 20.782 19.908C20.5903 20.2843 20.2843 20.5903 19.908 20.782C19.4802 21 18.9201 21 17.8 21H16M16 8V21M8 21H16"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <select name="another_job" id="another_job" class="w-100 pe-3 rounded-pill py-2">
                                <option value="">Do you have another job? *</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="position-relative
                      inputContainer rounded-pill select">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M8 8H6.2C5.0799 8 4.51984 8 4.09202 8.21799C3.71569 8.40973 3.40973 8.71569 3.21799 9.09202C3 9.51984 3 10.0799 3 11.2V17.8C3 18.9201 3 19.4802 3.21799 19.908C3.40973 20.2843 3.71569 20.5903 4.09202 20.782C4.51984 21 5.0799 21 6.2 21H8M8 8H16M8 8V7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7V8M8 8V21M16 8H17.8C18.9201 8 19.4802 8 19.908 8.21799C20.2843 8.40973 20.5903 8.71569 20.782 9.09202C21 9.51984 21 10.0799 21 11.2V17.8C21 18.9201 21 19.4802 20.782 19.908C20.5903 20.2843 20.2843 20.5903 19.908 20.782C19.4802 21 18.9201 21 17.8 21H16M16 8V21M8 21H16"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <select name="remote" id="remote" class="w-100 pe-3 rounded-pill py-2">
                                <option value="">Have you ever worked at Remote Hiring Hunt?</option>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex gap-4">
                        <div class="w-50 position-relative inputContainer rounded-pill select">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M22 8.0004V12.0004M10.25 5.5004H6.8C5.11984 5.5004 4.27976 5.5004 3.63803 5.82738C3.07354 6.115 2.6146 6.57394 2.32698 7.13843C2 7.78016 2 8.62024 2 10.3004L2 11.5004C2 12.4323 2 12.8982 2.15224 13.2658C2.35523 13.7558 2.74458 14.1452 3.23463 14.3482C3.60218 14.5004 4.06812 14.5004 5 14.5004V18.7504C5 18.9826 5 19.0987 5.00963 19.1964C5.10316 20.146 5.85441 20.8972 6.80397 20.9908C6.90175 21.0004 7.01783 21.0004 7.25 21.0004C7.48217 21.0004 7.59826 21.0004 7.69604 20.9908C8.64559 20.8972 9.39685 20.146 9.49037 19.1964C9.5 19.0987 9.5 18.9826 9.5 18.7504V14.5004H10.25C12.0164 14.5004 14.1772 15.4473 15.8443 16.356C16.8168 16.8862 17.3031 17.1513 17.6216 17.1123C17.9169 17.0761 18.1402 16.9435 18.3133 16.7015C18.5 16.4405 18.5 15.9184 18.5 14.8741V5.12668C18.5 4.0824 18.5 3.56025 18.3133 3.29929C18.1402 3.0573 17.9169 2.9247 17.6216 2.88853C17.3031 2.84952 16.8168 3.1146 15.8443 3.64475C14.1772 4.55351 12.0164 5.5004 10.25 5.5004Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <select name="hear_us" id="hear_us" class="w-100 pe-3 rounded-pill py-2">
                                <option value="">How did you hear about us?</option>
                                @foreach ($constants->where('type', 'hear_us') as $hear)
                                    <option value="{{ $hear->content }}">{{ $hear->content }}</option>
                                @endforeach
                                <option value="other">other</option>

                            </select>
                        </div>
                        <div class="w-50 position-relative inputContainer rounded-pill" id="other"
                            style="display: none;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M16.8 22H7.2H7.19997C6.07989 22 5.51984 22 5.09202 21.7821C4.7157 21.5903 4.40973 21.2844 4.21799 20.908C4 20.4802 4 19.9202 4 18.8V10.3255C4 9.83631 4 9.59171 4.05526 9.36154C4.10426 9.15746 4.18506 8.96238 4.29472 8.78343C4.41841 8.5816 4.59136 8.40865 4.93726 8.06274L4.93727 8.06274L10.0627 2.9373C10.4086 2.5914 10.5816 2.41845 10.7834 2.29476C10.9624 2.18511 11.1575 2.1043 11.3615 2.05531C11.5917 2.00005 11.8363 2.00005 12.3255 2.00005H16.8C17.9201 2.00005 18.4802 2.00005 18.908 2.21803C19.2843 2.40978 19.5903 2.71574 19.782 3.09207C20 3.51989 20 4.07994 20 5.20005V18.8C20 19.9202 20 20.4802 19.782 20.908C19.5903 21.2843 19.2843 21.5903 18.908 21.7821C18.4802 22 17.9201 22 16.8 22Z"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M5 9H9.92308C10.5178 9 11 8.51784 11 7.92307V3" stroke="white"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <input type="text" class="form-control rounded-pill pe-3" name="other"
                                placeholder="Write the source">
                        </div>
                    </div>
                    <div class="d-flex  gap-4">
                        <div class=" w-100 position-relative inputContainer file rounded-pill">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16 12L12 8M12 8L8 12M12 8V17.2C12 18.5907 12 19.2861 12.5505 20.0646C12.9163 20.5819 13.9694 21.2203 14.5972 21.3054C15.5421 21.4334 15.9009 21.2462 16.6186 20.8719C19.8167 19.2036 22 15.8568 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 15.7014 4.01099 18.9331 7 20.6622"
                                    stroke="#8438F1" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                            <input type="file" class="form-control  pe-3" id="file" name="resume">
                            <label for="file">Upload your
                                reusme here</label>
                        </div>
                        <div class=" w-100 position-relative inputContainer rounded-pill">
                            <svg class="icon-form" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path
                                    d="M12 14C14.2091 14 16 12.2091 16 10C16 7.79086 14.2091 6 12 6H6C3.79086 6 2 7.79086 2 10C2 11.8638 3.27477 13.4299 5 13.874M12 10C9.79086 10 8 11.7909 8 14C8 16.2091 9.79086 18 12 18H18C20.2091 18 22 16.2091 22 14C22 12.1362 20.7252 10.5701 19 10.126"
                                    stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                            <input type="url" class="form-control rounded-pill pe-3" id="url"
                                name="url" placeholder="url">
                        </div>
                    </div>
                    <button type="submit" class="btn rounded-pill px-4 mx-auto d-block mt-5">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </section>
</x-layout.layout>
