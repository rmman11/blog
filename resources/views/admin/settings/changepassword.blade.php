<form id="resetpassword" method="post" action="{{ route('admin.settings.reset-password') }}">
    @csrf
@method('put')
<h3>Resetare parola utilizator</h3>
        
    <div class="form-group row">
                            <label for="password">Parola actuala</label>

                     
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password"  placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>



    <div class="form-group row">
                            <label for="new_password">{{ __('Password') }}</label>

                            <input id="new_password" type="password"  class="form-control @error('password') is-invalid @enderror"  name="new_password"   
                            placeholder="New Password" id="new_password">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                        </div>

                        <div class="form-group row">
                            <label for="new_confirm_password">{{ __('Confirm Password New') }}</label>

                            <input id="new_confirm_password" type="password" class="form-control @error('new_confirm_password') is-invalid @enderror"   name="new_confirm_password" 
                            placeholder="Confirm Password New">
                            @error('new_confirm_password') <span class="invalid-feedback" role="alert">{{ $message }}</span>@enderror
                        </div>

                        <button type="submit" class="btn btn-danger">Reset Password</button>


</form>
</div>