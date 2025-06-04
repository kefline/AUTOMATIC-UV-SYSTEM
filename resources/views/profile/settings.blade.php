@extends('layouts.app')

@section('content')
<div class="container-full">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h4 class="box-title">Account Settings</h4>
                    </div>
                    <div class="box-body">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form action="{{ route('profile.settings.update') }}" method="POST">
                            @csrf
                            
                            <!-- Notification Preferences -->
                            <div class="mb-4">
                                <h5 class="text-dark">Notification Preferences</h5>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" 
                                               class="custom-control-input" 
                                               id="email_notifications" 
                                               name="notification_preferences[]" 
                                               value="email"
                                               {{ in_array('email', old('notification_preferences', $user->settings->notification_preferences ?? [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="email_notifications">
                                            Email Notifications
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" 
                                               class="custom-control-input" 
                                               id="system_notifications" 
                                               name="notification_preferences[]" 
                                               value="system"
                                               {{ in_array('system', old('notification_preferences', $user->settings->notification_preferences ?? [])) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="system_notifications">
                                            System Notifications
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <!-- Theme Preference -->
                            <div class="mb-4">
                                <h5 class="text-dark">Theme Preference</h5>
                                <div class="form-group">
                                    <select class="form-control" name="theme_preference">
                                        <option value="light" {{ old('theme_preference', $user->settings->theme_preference ?? '') == 'light' ? 'selected' : '' }}>
                                            Light Mode
                                        </option>
                                        <option value="dark" {{ old('theme_preference', $user->settings->theme_preference ?? '') == 'dark' ? 'selected' : '' }}>
                                            Dark Mode
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Language Preference -->
                            <div class="mb-4">
                                <h5 class="text-dark">Language</h5>
                                <div class="form-group">
                                    <select class="form-control" name="language">
                                        <option value="en" {{ old('language', $user->settings->language ?? '') == 'en' ? 'selected' : '' }}>
                                            English
                                        </option>
                                        <option value="es" {{ old('language', $user->settings->language ?? '') == 'es' ? 'selected' : '' }}>
                                            Spanish
                                        </option>
                                        <option value="fr" {{ old('language', $user->settings->language ?? '') == 'fr' ? 'selected' : '' }}>
                                            French
                                        </option>
                                        <option value="de" {{ old('language', $user->settings->language ?? '') == 'de' ? 'selected' : '' }}>
                                            German
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <!-- Security Settings -->
                            <div class="mb-4">
                                <h5 class="text-dark">Security</h5>
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" 
                                               class="custom-control-input" 
                                               id="two_factor" 
                                               name="security_settings[two_factor]" 
                                               {{ isset($user->settings->security_settings['two_factor']) && $user->settings->security_settings['two_factor'] ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="two_factor">
                                            Enable Two-Factor Authentication
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Save Settings</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 