<!DOCTYPE html>

<html lang="en">
<!--begin::Head-->

<head>
    <title>BracNet-ERP</title>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Security-Policy"
        content="script-src 'self' 'nonce-<?php echo e($cspNonce); ?>'; style-src 'self' 'nonce-<?php echo e($cspNonce); ?>' https://fonts.googleapis.com; font-src 'self' https://fonts.gstatic.com; img-src 'self' data:; object-src 'none'; frame-src 'none'; base-uri 'self';">
    <meta name="description" content="" />
    <meta name="keywords" content="bracnet, bracnet, bootstrap 5, crm, CRM" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="BracNet ERP" />
    <meta property="og:url" content="https://keenthemes.com/metronic" />
    <meta property="og:site_name" content="BracNet ERP" />

    <link rel="shortcut icon" href="<?php echo e(asset('assets/media/logos/favicon.svg')); ?>" type="image/svg+xml" />

    <!--begin::Fonts(mandatory for all pages)-->
    <link nonce="<?php echo e($cspNonce); ?>" rel="preconnect" href="https://fonts.googleapis.com">
    <link nonce="<?php echo e($cspNonce); ?>" rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" nonce="<?php echo e($cspNonce); ?>"
        href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="<?php echo e(asset('assets/plugins/global/plugins.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('assets/css/style.bundle.css')); ?>" rel="stylesheet" type="text/css" />
    <!--end::Global Stylesheets Bundle-->

    <style nonce="<?php echo e($cspNonce); ?>">
        body {
            background-image: url('assets/media/auth/bg4.jpg');
        }

        .login-btn {
            background-color: #f57e20;
            color: white;
        }

        .login-btn:hover {
            color: white;
        }
    </style>

</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="app-blank bgi-size-cover bgi-attachment-fixed bgi-position-center bgi-no-repeat">

    <!--begin::Root-->
    <div class="d-flex flex-column flex-root" id="kt_app_root">
        <!--begin::Authentication - Sign-in -->
        <div class="d-flex flex-column flex-column-fluid flex-lg-row">
            <!--begin::Aside-->
            <div class="d-flex flex-center w-lg-50 pt-15 pt-lg-0 px-10">
                <!--begin::Aside-->
                <div class="d-flex flex-center flex-lg-start flex-column">
                    <!--begin::Logo-->
                    
                    <!--end::Logo-->
                </div>
                <!--begin::Aside-->
            </div>
            <!--begin::Aside-->

            <!--begin::Body-->
            <div
                class="d-flex flex-column-fluid flex-lg-row-auto justify-content-center justify-content-lg-end p-12 p-lg-20">
                <!--begin::Card-->
                <div class="bg-body d-flex flex-column align-items-stretch flex-center rounded-4 w-md-600px p-20">
                    <!--begin::Wrapper-->
                    <div class="d-flex flex-center flex-column flex-column-fluid px-lg-10 pb-15 pb-lg-20">

                        <?php echo $__env->make('message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                        <!--begin::Form-->
                        <form class="form w-100" action="<?php echo e(route('login')); ?>" method="POST">

                            <?php echo csrf_field(); ?>

                            <!--begin::Heading-->
                            <div class="text-center mb-11">
                                <!--begin::Title-->
                                <h1 class="text-gray-900 fw-bolder mb-3">
                                    Sign In
                                </h1>
                                <!--end::Title-->

                                <!--begin::Subtitle-->
                                <div class="text-gray-500 fw-semibold fs-6">
                                    Sign In to OurAbs
                                </div>
                                <!--end::Subtitle--->
                            </div>
                            <!--begin::Heading-->

                            <!--begin::Input group--->
                            <div class="fv-row mb-8">
                                <!--begin::User PIN-->
                                <input type="email" placeholder="Enter Username/Email" name="email" autocomplete="off"
                                    class="form-control bg-transparent <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                                    value="<?php echo e(old('email')); ?>" />
                                <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger mt-2"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <!--end::User PIN-->
                            </div>

                            <!--end::Input group--->
                            <div class="fv-row mb-3">
                                <!--begin::Password-->
                                <div class="input-group">
                                    <input type="password" placeholder="Enter Password" name="password" id="password"
                                        autocomplete="off"
                                        class="form-control bg-transparent <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" />
                                    <button type="button" class="input-group-text" id="togglePasswordBtn">
                                        <i class="passwordIcon"></i>
                                    </button>
                                </div>
                                <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger mt-2"><?php echo e($message); ?></span>
                                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                <!--end::Password-->
                            </div>
                            <!--end::Input group--->

                            <!--begin::Wrapper-->
                            <div class="d-flex flex-stack flex-wrap gap-3 fs-base fw-semibold mb-8">
                                <div></div>

                                <!--begin::Link-->
                                <a href="javascript:void(0)" class="link-primary">
                                    Forgot Password ?
                                </a>
                                <!--end::Link-->
                            </div>
                            <!--end::Wrapper-->

                            <!--begin::Submit button-->
                            <div class="d-grid mb-10">
                                <button type="submit" class="btn login-btn">
                                    Sign In
                                </button>
                            </div>
                            <!--end::Submit button-->
                        </form>
                        <!--end::Form-->

                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Card-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Authentication - Sign-in-->
    </div>
    <!--end::Root-->

    <!--begin::Javascript-->

    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="<?php echo e(asset('assets/plugins/global/plugins.bundle.js')); ?>"
        <?php echo e(Sri::html('assets/plugins/global/plugins.bundle.js')); ?>></script>
    <script src="<?php echo e(asset('assets/js/scripts.bundle.js')); ?>" <?php echo e(Sri::html('assets/js/scripts.bundle.js')); ?>></script>
    <!--end::Global Javascript Bundle-->


    <!--begin::Custom Javascript(used for this page only)-->
    <script src="<?php echo e(asset('assets/js/custom/authentication/sign-in/general.js')); ?>"
        <?php echo e(Sri::html('assets/js/custom/authentication/sign-in/general.js')); ?>></script>
    <!--end::Custom Javascript-->

    <script nonce="<?php echo e($cspNonce); ?>">
        var hostUrl = "assets/";

        // Generic function to toggle password visibility and icon
        function togglePasswordVisibility(buttonSelector, fieldSelector, iconSelector) {
            $(buttonSelector).on('click', function() {
                const passwordField = $(fieldSelector);
                const icon = $(iconSelector);

                if (passwordField.attr('type') === 'password') {
                    passwordField.attr('type', 'text');
                    icon.removeClass('fas fa-eye').addClass('fa fa-eye-slash');
                } else {
                    passwordField.attr('type', 'password');
                    icon.removeClass('fa fa-eye-slash').addClass('fas fa-eye');
                }
            });
        }

        // Initial setup of icons
        $(".passwordIcon").addClass('fas fa-eye');

        // Apply function to each button and field
        togglePasswordVisibility('#togglePasswordBtn', '#password', '.passwordIcon');
    </script>
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
<?php /**PATH D:\xampp\htdocs\abs\resources\views/auth/login.blade.php ENDPATH**/ ?>