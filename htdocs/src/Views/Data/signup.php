<?php
global $firstName, $lastName, $otherName, $username, $password, $email, $v_firstName, $v_lastName, $v_otherName, $v_username, $v_password, $v_email;
return "
                      <h4 class='my-3 text-capitalize'>registration information required (<span class='text-danger d-inline-block bi bi-asterisk'></span>)</h4>
                      <form class='needs-validation' novalidate>
                        <input type='hidden' name='form-action' value='registration' />
                        <div class='row g-3'>
                          <div class='col-sm-4'>
                            <label for='firstName' class='form-label'>First name</label>
                            <input class='form-control$v_firstName' id='firstName' name='firstName' minlength='3' maxlength='64' pattern='^[a-zA-Z][a-zA-Z0-9]{2,63}$' placeholder='required' value='$firstName' required />
                            <div class='invalid-feedback'>Valid first name is required.</div>
                          </div>
                          <div class='col-sm-4'>
                            <label for='lastName' class='form-label'>Last name</label>
                            <input class='form-control$v_lastName' id='lastName' name='lastName' minlength='3' maxlength='64' pattern='^[a-zA-Z][a-zA-Z0-9]{2,63}$' placeholder='required' value='$lastName' required />
                            <div class='invalid-feedback'>Valid last name is required.</div>
                          </div>
                          <div class='col-sm-4'>
                            <label for='otherName' class='form-label'>Order name</label>
                            <input class='form-control$v_otherName' id='otherName' name='otherName' placeholder='optional' value='$otherName' />
                            <div class='invalid-feedback'>Valid last name is required.</div>
                          </div>
                          <div class='col-12'>
                            <label for='username' class='form-label'>Username</label>
                            <div class='input-group has-validation'>
                              <label for='username' class='input-group-text px-5'><i class='bi bi-at fs-4'></i></label>
                              <input class='form-control$v_username' id='username' name='username' minlength='6' maxlength='64' value='$username' pattern='^[a-z]+\.?[a-z0-9]+$' placeholder='Username required' required />
                              <div class='invalid-feedback'>Your username is required</div>
                            </div>
                          </div>
                          <div class='input-group mt-1 mb-4'>
                            <label class='input-group-text col-form-label pe-4' for='password'><span class='text-danger d-inline-block bi bi-asterisk'></span>Password</label>
                            <input class='form-control form-control-lg password$v_password' type='password' id='password' name='password' value='$password' pattern='^(?=\S*?[A-Z])(?=\S*?[a-z])(?=\S*?[0-9])\S+$' placeholder='Password' required />
                            <button class='btn btn-outline-secondary toggle-password rounded-end-1' data-bs-toggle='' data-bs-target='assword' type='button' title='Press to toggle password'><i class='bi bi-eye-slash'></i></button>
                            <div class='invalid-feedback'>Your password is required.</div>
                          </div>
                          <div class='col-12'>
                            <label for='email' class='form-label'>Email (<span class='text-body-secondary text-capitalize'>required</span>)</label>
                            <input type='email' class='form-control$v_email' id='email' name='email' value='$email' placeholder='you@domain.com' required />
                            <div class='invalid-feedback'>Please enter a valid email address</div>
                          </div>
                        </div>
                        <hr class='my-4'>
                        <button class='w-75 btn btn-primary btn-lg text-capitalize mx-auto d-block' type='submit'>signup</button>
                      </form>
                    ";
