<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registrasi/css.css">
    <title>Registrasi</title>
</head>
<body>
<x-slot name="logo">
            <x-jet-authentication-card-logo />
            <img src="{{ url('logo.png') }}" />
        </x-slot>
        <x-jet-validation-errors class="mb-4"/>
        <div class="form_wrapper">
  <div class="form_container">
    <div class="title_container">
      <h2>Responsive Registration Form</h2>
    </div>
    <div class="row clearfix">
      <div class="">
        <form  method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            @csrf
        <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input id="name" type="text" name="name" :value="old('name')" placeholder="username"required autofocus autocomplete="name"/>
          </div>

          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-envelope"></i></span>
            <input  id="email"  type="email" name="email" :value="old('email')"placeholder="email" required  />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input id="password" class="block mt-1 w-full" type="password" name="password" placeholder="password" required autocomplete="new-password" />
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" placeholder="confirm password" required autocomplete="new-password"  />
          </div>
          <div class="row clearfix">
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
              <input type="text" name="nama_lengkap"  id="nama_lengkap"placeholder="Nama Lengkap" />
                        
              </div>
            </div>
            <div class="col_half">
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-user"></i></span>
              <input type="text" name="umur" id="umur" placeholder="umur" />
              </div>
            </div>
          </div>
          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="text" name="pekerjaan" id="pekerjaan" placeholder="Pekerjaan"  required />
          </div>
          
          <div class="input_field radio_option">
              <input type="radio" name="jenis_kelamin" id="rd1" value="pria" >
              <label for="rd1">Male</label>
              <input type="radio" name="jenis_kelamin" id="rd2" value="wanita" >
              <label for="rd2">Female</label>
              </div>
              <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Tanggal Lahir"  required />
          </div>

          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
            <input type="text" name="telepon"  id="telepon" placeholder="telepon" required />
          </div>

          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
          <textarea name="alamat" name="alamat" placeholder="alamat"></textarea>
          </div>

          <div class="input_field"> <span><i aria-hidden="true" class="fa fa-lock"></i></span>
          <label for="foto">Foto</label>
          <input name="foto" id="foto" type="file" placeholder="foto">
          </div>
              <!-- <div class="input_field select_option">
                <select>
                  <option>Select a country</option>
                  <option>Option 1</option>
                  <option>Option 2</option>
                </select>
                <div class="select_arrow"></div>
              </div> -->
              @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms" required />

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div> 
                    </x-jet-label>
                </div>
            @endif
            <div class="input_field checkbox_option" >
            	<input type="checkbox" id="cb1" name="terms" required>
    			<label for="cb1">I agree with terms and conditions</label>
            </div>
            <div class="input_field checkbox_option">
            	<input type="checkbox" id="cb2">
    			<label for="cb2">I want to receive the newsletter</label>
            </div>
          
          <button type="submit" class="button">register</button>
        </form>
      </div>
    </div>
  </div>
</div>
<p class="credit">Developed by <a href="http://www.designtheway.com" target="_blank">Design the way</a></p>

</html>
