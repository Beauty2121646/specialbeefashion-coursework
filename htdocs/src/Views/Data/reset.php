<?php
global $username_email, $v_username_email;
return "
                      <h4 class='my-3 text-capitalize'>forgotten password? Username or E-mail (<span class='text-danger d-inline-block bi bi-asterisk'></span>)</h4>
                      <form class='needs-validation' novalidate>
                        <input type='hidden' name='form-action' value='forgotten' />
                        <div class='row g-3'>
                          <div class='col-12'>
                            <label for='username_emails' class='form-label col-form-label-lg'>Username</label>
                            <div class='input-group has-validation'>
                              <label for='username_emails' class='input-group-text col-form-label-lg px-5 fs-3'>@</label>
                              <input class='form-control form-control-lg$v_username_email' id=\"username_emails\" name='username_email' value='$username_email' placeholder='required' required />
                              <div class='invalid-feedback'>Your username is required</div>
                            </div>
                          </div>
                        </div>
                        <hr class='my-4'>
                        <button class='w-75 btn btn-primary btn-lg text-capitalize mx-auto d-block' type='submit'>request reset password</button>
                      </form>
                    ";
