<?php $__env->startSection('body'); ?>
    <!DOCTYPE html>
    <html lang="es-CO">

    <head>
        <base href="/stem-is-website-entre-profes/">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />

        <link rel="stylesheet" href="<?php echo e(asset('css/style-stem-canva.css')); ?>">

    </head>
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N5KN7SX" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <div id="wrapper">
        <?php echo $__env->make('layouts.navbars.mega-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div class="main-area">
            <div class="container portada">
            </div>

            <div id="SlBZW460vgtIGCMW" style="display:grid;position:relative;grid-area:1 / 2 / 2 / 3;">
                <div id="dEQyBedhz89fLLmg" style="z-index:43;">
                    <div id="sxqVBEmXiXWtB165" style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                        <div id="ro26rM5HDhEZwYxu"
                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                            <p id="OIBsBzHY0hNS0uXN" style="color:#000000;line-height:1.4em;">
                                <span id="ng1Vyw7gtv7RcIvu" style="color:#000000;">Área: <?php echo e($user->area); ?></span>
                            </p>
                            <p id="wqBHlA9BeWvANiig" style="color:#000000;line-height:1.4em;">
                                <span id="UKThp7GIwuQbh1GX" style="color:#000000;">Correo:
                                    <?php echo e($user->email); ?></span>
                            </p>
                            <p id="IyXrabceSf6zQTzd"
                                style="color:#000000;line-height:1.4em;text-align:left;"><span
                                    id="YSQk8i0Ba7fYVUSX" style="color:#000000;">Tel: <?php echo e($user->phone_number); ?></span><br></p>
                        </div>
                    </div>
                </div>
                <div id="DnsK5NHGK41GGfcL" style="z-index: 33;">
                    <div id="JFuLS5wKJU15LFVK" style="transform: rotate(-90deg); width: 100%; box-sizing: border-box; height: 100%;">
                        <div id="kSP2OCMszidNrMrM" style="flex-direction: column; display: flex; width: 100%; justify-content: flex-start; opacity: 1.0; height: 100%;">
                            <p id="NBmH228k9Y4WIPV4" style="color: #000000; letter-spacing: 0em; line-height: 1.2em; text-align: center;">
                                <span id="meJfvddcIzkkk03q" style="color: #000000;">
                                    <?php echo e($user->name); ?>

                                </span><br>
                            </p>
                        </div>
                    </div>
                </div>

                <div id="DCtVfpnwdKVb7Lz3" style="z-index: 15;">
                    <div id="pLnZh11V1UbVgE7M" style="padding-top: 99.9996%; transform: rotate(0deg);">
                        <div id="nudSHQrJWRFyYEph" style="top: 0px; left: 0px; width: 100%; position: absolute; height: 100%;">
                            <svg id="rDG56E28UJCehfqV" viewBox="0 0 500.0 499.998" style="overflow: hidden; top: 0%; left: 0%; width: 100%; position: absolute; opacity: 1.0; height: 100%;">
                                <g id="Jhl9fZsUeIpP9ixv" style="transform: scale(1, 1);">
                                    <foreignObject id="acLCUahOhXp0ZkSA" style="width: 500px; height: 499.998px;">
                                        <div id="w72cVcJT5Gz4q0ON" style="clip-path: path('M500 250.002c0 138.065-111.931 249.996-250 249.996-138.071 0-250-111.931-250-249.996C0 111.93 111.929 0 250 0s250 111.93 250 250.002z');">
                                            <div id="IG4ChFgAxRfKJTAF" style="transform: scale(1, 1); transform-origin: 250px 250px;">
                                                <img src="<?php echo e($user->url ? asset($user->url) : asset('images/default-profile.png')); ?>" title="imagen" loading="lazy"
                                                     style="transform: translate(-4.65969453px, 0px) rotate(0deg); display: block; object-fit: fill; width: 524.64115988px; transform-origin: 262.32057994px 393.48086991px; opacity: 1.0; height: 786.96173982px;">
                                            </div>
                                        </div>
                                    </foreignObject>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>

                <div id="Grb3vjRsn5n2Bfz8" style="z-index:17;">
                    <div id="vsIwAfcYSwIkdVGa" style="padding-top:100%;transform:rotate(1deg);">
                        <div id="M4VDqsucsIBeGslu" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <div id="kpYW7q0eCuTGH535" style="width:100%;opacity:1.0;height:100%;">
                                <div id="ezKSqoC8uqEC53db"
                                    style="transform:scale(1, 1);overflow:hidden;width:100%;position:relative;height:100%;">
                                    <div id="blZcFAD3mVO3XJIM"
                                        style="transform:rotate(0deg);top:0%;left:0%;width:100%;position:absolute;height:100%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;">
                                        <img src=" <?php echo e(asset('images/aecd49c5564f46c2b305f9cc0e3ee672.svg')); ?> " alt="Facebook Circle Logo"
                                            loading="lazy" style="display:block;object-fit:cover;width:100%;height:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="mH5yc0fZKyIowkJN" style="z-index:28;">
                    <div id="fK9AwEopoKlJayBX" style="padding-top:100%;transform:rotate(0deg);">
                        <div id="lJHoJuIbLiWubxQA" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <div id="jbOyDEoh2fktgRaF" style="width:100%;opacity:1.0;height:100%;">
                                <div id="zRhsJWIpE802Kjpi"
                                    style="transform:scale(1, 1);overflow:hidden;width:100%;position:relative;height:100%;">
                                    <div id="Ovm6ehYfiMWJRPEp"
                                        style="transform:rotate(0deg);top:0%;left:0%;width:100%;position:absolute;height:100%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;">
                                        <img src=" <?php echo e(asset('images/c329adb0878be20ebe7ff1f283db99b7.svg')); ?> " alt="In Blue Logo Vector"
                                            loading="lazy" style="display:block;object-fit:cover;width:100%;height:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="QdEfiEzPVKpxGB2A" style="z-index:16;">
                    <div id="Cb0qNAJkDgUTWNOu" style="padding-top:100%;transform:rotate(0deg);">
                        <div id="yMW2fC2ZnNogJzHW" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <div id="fU592GvwqdEgLy1L" style="width:100%;opacity:1.0;height:100%;">
                                <div id="INnPTEUfANob6ovt"
                                    style="transform:scale(1, 1);overflow:hidden;width:100%;position:relative;height:100%;">
                                    <div id="cp4YPwFoEUDFXki8"
                                        style="transform:rotate(0deg);top:0%;left:0%;width:100%;position:absolute;height:100%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;">
                                        <img src="<?php echo e(asset('images/ca2acae4cc94f1945763f4b33c278106.svg')); ?>" alt="Twitter Logo"
                                            loading="lazy" style="display:block;object-fit:cover;width:100%;height:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="UlM9qj6Klf5uX5Wn" style="z-index:41;">
                    <div id="hsSFknpETB7Lkay2"
                        style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                        <div id="NN4v4Nw2BSgYb593"
                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                            <p id="BUSn3H3w82iDmxFP"
                                style="margin-left:0em;text-transform:none;color:#000000;letter-spacing:0em;line-height:1.4em;direction:ltr;text-align:left;">
                                <span id="GXOAqHAqqMYPVN3p" style="color:#000000;">@</span><span id="x81E7dwQRRuBk6TF"
                                    style="text-decoration-line:none;color:#000000;font-weight:400;font-style:normal;"><a href="<?php echo e($user->facebook_link); ?>"><?php echo e($user->name); ?></a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="E8YE8nqxyGPvd4nE" style="z-index:44;">
                    <div id="g3aI08zIVCUoS5Ag"
                        style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                        <div id="VYI5zBOPAZU7RJo5"
                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                            <p id="bUIhaMFYugKsO7e6"
                                style="margin-left:0em;text-transform:none;color:#000000;letter-spacing:0em;line-height:1.4em;direction:ltr;text-align:left;">
                                <span id="aRWkSyFOkTq5pk1v" style="color:#000000;">@</span><span id="CS47Kh0ndenqbNHs"
                                    style="text-decoration-line:none;color:#000000;font-weight:400;font-style:normal;"><a href="<?php echo e($user->linkedin_link); ?>"><?php echo e($user->name); ?></a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="EN6LG5niZ6j824Xq" style="z-index:40;">
                    <div id="qJaIsMO7sGOy1chA"
                        style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                        <div id="Oofl8xcOeJIiePTh"
                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                            <p id="oy0u75unzmR6JSjd"
                                style="margin-left:0em;text-transform:none;color:#000000;letter-spacing:0em;line-height:1.4em;direction:ltr;text-align:left;">
                                <span id="OnqhT54NjPnZ4zGX" style="color:#000000;">@</span><span id="CJU80JyEI6Q7FGAn"
                                    style="text-decoration-line:none;color:#000000;font-weight:400;font-style:normal;"><a href="<?php echo e($user->twitter_link); ?>"><?php echo e($user->name); ?></a></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div id="ABesbJYt0IQrJwaD" style="z-index:1;">
                    <div id="Raqkob4eDvOkfGWi" style="padding-top:200.9040102%;transform:rotate(0deg);">
                        <div id="avXCYygoPhmAYbbb" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <div id="ouQLzcOaaUIPOZ9C" style="width:100%;opacity:1.0;height:100%;">
                                <div id="yByeAOQz4omlxVaz"
                                    style="transform:scale(1, 1);overflow:hidden;width:100%;position:relative;height:100%;">
                                    <div id="STw8QErgQAuYH9y7" class="scale_rotated_fill"
                                        data-container-width="225.18755778" data-container-height="452.41083405"
                                        data-imagebox-width="452.41083405" data-imagebox-height="452.41083405"
                                        data-imagebox-top="0" data-imagebox-left="-227.22327627"
                                        data-imagebox-rotation="-90"
                                        style="transform:rotate(-90deg);top:0%;left:-100.9040102%;width:200.9040102%;position:absolute;height:100%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;">
                                        <img src="<?php echo e(asset('images/5a3cca9a81315b82641061eca4e6d707.svg')); ?>"
                                            alt="circle eight shapes section infographics" loading="lazy"
                                            style="display:block;object-fit:cover;width:100%;height:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="EvWzUNzVbmOmBEWD">
                    <div id="ao1lgx7FuiL9811a" style="display:grid;position:relative;">
                        <div id="KFeq6hYnXkK9swPU" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                            <div id="MN3IHyJ5G4IcKZVg" style="z-index:20;">
                                <div id="GJBrOHLF2pghsbeo" style="padding-top:100%;transform:rotate(0deg);">
                                    <div id="RF1KrBpn9ZSMQFzR"
                                        style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                            id="nhhvk5KULzHQBIqx" viewBox="0 0 64.0 64.0"
                                            style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                            <g id="KzX5ryCB1lS2F9nz" style="transform:scale(1, 1);">
                                                <path id="pY2u182IN5vjfwqC"
                                                    d="M31.99999999999998,0.0 C14.326888084411612,0.0 0.0,14.326888084411612 0.0,31.99999999999998 C0.0,49.67311096191403 14.326888084411612,63.99999999999996 31.99999999999998,63.99999999999996 C49.67311096191403,63.99999999999996 63.99999999999996,49.67311096191403 63.99999999999996,31.99999999999998 C63.99999999999996,14.326888084411612 49.67311096191403,0.0 31.99999999999998,0.0"
                                                    style="fill:#ffffff;opacity:1.0;"></path>
                                            </g>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="e5NcU38OAXZGOkuK" style="display:grid;position:relative;grid-area:3 / 3 / 4 / 4;">
                                <div id="zwvcEarBx6N9iwY9" style="z-index:21;">
                                    <div id="KeiOXVMZxwjAaMVY" style="padding-top:100%;transform:rotate(0deg);">
                                        <div id="ujeCZAVaRpeDp3fa"
                                            style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                                id="JuIttUtj3dgOJJSz" viewBox="0 0 64.0 64.0"
                                                style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                                <g id="NH47mUlviIPtpyZC" style="transform:scale(1, 1);">
                                                    <path id="bxgPAnWfC8rbCPNt"
                                                        d="M31.999999999999936,0.0 C14.326888084411593,0.0 0.0,14.326888084411593 0.0,31.999999999999936 C0.0,49.67311096191396 14.326888084411593,63.99999999999987 31.999999999999936,63.99999999999987 C49.67311096191396,63.99999999999987 63.99999999999987,49.67311096191396 63.99999999999987,31.999999999999936 C63.99999999999987,14.326888084411593 49.67311096191396,0.0 31.999999999999936,0.0"
                                                        style="fill:#161616;opacity:1.0;"></path>
                                                </g>
                                            </svg></div>
                                    </div>
                                </div>
                                <div id="fzgrUFTaGpLjgvTn" style="z-index:42;">
                                    <div id="fQoGHvrBx6KKfSFT"
                                        style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                        <div id="IJH7raCBT90DfuVv"
                                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                            <p id="wukWOxm5oRGk4Mht"
                                                style="margin-left:0em;text-transform:uppercase;color:#ffffff;letter-spacing:0em;line-height:1.4em;direction:ltr;text-align:center;">
                                                <span id="zwwJQwQWRKlClJMm" style="color:#ffffff;">I</span><br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="dKKrKmHC3A5tHUUC">
                    <div id="vhLEmguqwphBiexd" style="display:grid;position:relative;">
                        <div id="fAHYDnPIygk76u0M" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                            <div id="PMtBhoHMEMrzuXfZ" style="z-index:7;">
                                <div id="wl4UecgaLRcAoa0U" style="padding-top:100%;transform:rotate(-90deg);">
                                    <div id="qh0ygPTvKNBrZGKq"
                                        style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                            id="jGb7uKnsi31HCEmL" viewBox="0 0 64.0 64.0"
                                            style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                            <g id="Jrwk3uQv6qzGkyae" style="transform:scale(1, 1);">
                                                <path id="M5wsxVwJ9SMQ10Br"
                                                    d="M31.99999999999998,0.0 C14.326888084411612,0.0 0.0,14.326888084411612 0.0,31.99999999999998 C0.0,49.67311096191403 14.326888084411612,63.99999999999996 31.99999999999998,63.99999999999996 C49.67311096191403,63.99999999999996 63.99999999999996,49.67311096191403 63.99999999999996,31.99999999999998 C63.99999999999996,14.326888084411612 49.67311096191403,0.0 31.99999999999998,0.0"
                                                    style="fill:#ffffff;opacity:1.0;"></path>
                                            </g>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="EKsYUfXaoUMKRfKG" style="display:grid;position:relative;grid-area:3 / 3 / 4 / 4;">
                                <div id="M8TzSiLcYElQ9fNE" style="z-index:8;">
                                    <div id="DeQ1OBVilFaAxpUb" style="padding-top:100%;transform:rotate(-90deg);">
                                        <div id="nIeNWSYCwfSDBagV"
                                            style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                                id="nhmyvLIA6jd6YnjE" viewBox="0 0 64.0 64.0"
                                                style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                                <g id="af0bPOrWC7KNhwy4" style="transform:scale(1, 1);">
                                                    <path id="Pr3uV305s5IFLrrr"
                                                        d="M32.00000000000003,0.0 C14.326888084411634,0.0 0.0,14.326888084411634 0.0,32.00000000000003 C0.0,49.673110961914105 14.326888084411634,64.00000000000006 32.00000000000003,64.00000000000006 C49.673110961914105,64.00000000000006 64.00000000000006,49.673110961914105 64.00000000000006,32.00000000000003 C64.00000000000006,14.326888084411634 49.673110961914105,0.0 32.00000000000003,0.0"
                                                        style="fill:#ec2b2b;opacity:1.0;"></path>
                                                </g>
                                            </svg></div>
                                    </div>
                                </div>
                                <div id="ZFQPE3XYLafp9SXl" style="z-index:34;">
                                    <div id="IfoCKi3EYpzGl04M"
                                        style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                        <div id="NXdQhgCCJ0YSrHag"
                                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                            <p id="EADZniMYOe6W5piT"
                                                style="text-transform:uppercase;color:#000000;letter-spacing:0em;line-height:1.4em;text-align:center;">
                                                <span id="qrHT3W3lSRWVj4Q0" style="color:#000000;">H</span><br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="M3SnCp2nXu8YQRS9" style="z-index:18;">
                    <div id="xWVv099c6vHFhJ1H" style="padding-top:145.32635461%;transform:rotate(0deg);">
                        <div id="K4XJG4X2V92Fee0s" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <svg id="BmDqo3nbDZfbSudv" viewBox="0 0 35.975707764366575 52.282184637440025"
                                preserveAspectRatio="none"
                                style="overflow:visible;display:block;width:100%;min-height:1px;fill:#161616;opacity:1.0;stroke:#161616;height:100%;">
                                <g id="KzXCTZZWdiBLkKsg">
                                    <path d="M1.3875037674572135,50.8946808699828 L34.588203996909364,1.3875037674572113"
                                        style="stroke-dasharray:0,4;stroke-width:2px;fill:none;stroke-linecap:round;">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="CgHoAp9UekwQUnBy" style="z-index:27;">
                    <div id="jrAsZUNzocOIOXDs" style="padding-top:113.92265782%;transform:rotate(0deg);">
                        <div id="cnNesxU8BFXxXKwU" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <svg id="bRzHkoUC6guXKt4m" viewBox="0 0 33.76248938139503 38.4631252481297"
                                preserveAspectRatio="none"
                                style="overflow:visible;display:block;width:100%;min-height:1px;fill:#4db95f;opacity:1.0;stroke:#4db95f;height:100%;">
                                <g id="h3eMWmlWFjtod9Tj">
                                    <path d="M32.351787008844106,37.052422875579005 L1.410702372550979,1.4107023725511496"
                                        style="stroke-dasharray:0,4;stroke-width:2px;fill:none;stroke-linecap:round;">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="cLeAuqrUYuhbgxf6" style="z-index:23;">
                    <div id="b0c2qBI94SnsEspT" style="padding-top:4.28367708%;transform:rotate(0deg);">
                        <div id="vC4IdHMgMp0qgZMw" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <svg id="dRtFhlW76ns22Nct" viewBox="0 0 71.26086387539755 3.0525852963180427"
                                preserveAspectRatio="none"
                                style="overflow:visible;display:block;width:100%;min-height:1px;fill:#161616;opacity:1.0;stroke:#161616;height:100%;">
                                <g id="YGnoYHT1cY0DKCSK">
                                    <path d="M1.0146692486743056,2.037916047643655 L70.24619462672307,1.0146692486743876"
                                        style="stroke-dasharray:0,4;stroke-width:2px;fill:none;stroke-linecap:round;">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="kU5YWh7EPaWBT7nd" style="z-index:26;">
                    <div id="i6SyuH4hllANRQrU" style="padding-top:4.81973762%;transform:rotate(0deg);">
                        <div id="nElbpaTgCExLc4n5" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <svg id="Acao3m92yAP4BWN8" viewBox="0 0 68.8573399473666 3.31874311548529"
                                preserveAspectRatio="none"
                                style="overflow:visible;display:block;width:100%;min-height:1px;fill:#ec2b2b;opacity:1.0;stroke:#ec2b2b;height:100%;">
                                <g id="ILtQ7vnhELeIRgcS">
                                    <path d="M1.018980647697636,1.018980647697651 L67.83835929966897,2.299762467787753"
                                        style="stroke-dasharray:0,4;stroke-width:2px;fill:none;stroke-linecap:round;">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="ahwqHmyDzJScpPXj">
                    <div id="RAsjKJco2hHQvn3g" style="display:grid;position:relative;">
                        <div id="vKpwJveP9uQ2r1BA" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                            <div id="K8lMUj8Qm7CkUH5G" style="z-index:13;">
                                <div id="Xuyy8H4bUeQN3NZt" style="padding-top:100%;transform:rotate(-90deg);">
                                    <div id="XyAGsi3bzNtjLHZQ"
                                        style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                            id="JIbeN0LNiaFhojgn" viewBox="0 0 64.0 64.0"
                                            style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                            <g id="PBMCMkknqAj09pEj" style="transform:scale(1, 1);">
                                                <path id="oslGmnBHGpy3Gbka"
                                                    d="M32.000000000000014,0.0 C14.326888084411628,0.0 0.0,14.326888084411628 0.0,32.000000000000014 C0.0,49.673110961914084 14.326888084411628,64.00000000000003 32.000000000000014,64.00000000000003 C49.673110961914084,64.00000000000003 64.00000000000003,49.673110961914084 64.00000000000003,32.000000000000014 C64.00000000000003,14.326888084411628 49.673110961914084,0.0 32.000000000000014,0.0"
                                                    style="fill:#ffffff;opacity:1.0;"></path>
                                            </g>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="MIg0zc1jQv4HqUJq" style="display:grid;position:relative;grid-area:3 / 3 / 4 / 4;">
                                <div id="Euu1KtW3oOxyMSQH" style="z-index:14;">
                                    <div id="K4bpTagyKk5uPGS2" style="padding-top:100%;transform:rotate(-90deg);">
                                        <div id="wDvKw08SIGIJc16p"
                                            style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                                id="fE8eB1dRXp3srJfk" viewBox="0 0 64.0 64.0"
                                                style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                                <g id="yAyFIWTGmjwPfGVu" style="transform:scale(1, 1);">
                                                    <path id="ccmcqLEhnDamy6Db"
                                                        d="M31.99999999999998,0.0 C14.326888084411612,0.0 0.0,14.326888084411612 0.0,31.99999999999998 C0.0,49.67311096191403 14.326888084411612,63.99999999999996 31.99999999999998,63.99999999999996 C49.67311096191403,63.99999999999996 63.99999999999996,49.67311096191403 63.99999999999996,31.99999999999998 C63.99999999999996,14.326888084411612 49.67311096191403,0.0 31.99999999999998,0.0"
                                                        style="fill:#fccf19;opacity:1.0;"></path>
                                                </g>
                                            </svg></div>
                                    </div>
                                </div>
                                <div id="r05wb0DkrGSpE3Wj" style="z-index:22;">
                                    <div id="vtSyHPIhckU4vNdS"
                                        style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                        <div id="QpyOYUK9dF3o8XLs"
                                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                            <p id="aEJIgdmX6E29cESE"
                                                style="margin-left:0em;text-transform:uppercase;color:#161616;letter-spacing:0em;line-height:1.4em;direction:ltr;text-align:center;">
                                                <span id="YLj8DBp8UMRoAWyi" style="color:#161616;">E</span><br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="pKjd58hU3BIiMlxZ">
                    <div id="cRmplFBfz6mjqMPf" style="display:grid;position:relative;">
                        <div id="QfDo7lLWi6lFkJ1E" style="display:grid;position:relative;grid-area:2 / 2 / 3 / 3;">
                            <div id="gwunfawOg97AuWrA" style="z-index:10;">
                                <div id="g2ZqiuPYlR5R3d5j" style="padding-top:100%;transform:rotate(-90deg);">
                                    <div id="japUKqOmh17ZMqjz"
                                        style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                            id="pfEcZaFVh3HTAHXZ" viewBox="0 0 64.0 64.0"
                                            style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                            <g id="zZ9WuzuNY38lnV7j" style="transform:scale(1, 1);">
                                                <path id="P5WIpZwfyPG99EoA"
                                                    d="M31.999999999999943,0.0 C14.326888084411596,0.0 0.0,14.326888084411596 0.0,31.999999999999943 C0.0,49.67311096191398 14.326888084411596,63.999999999999886 31.999999999999943,63.999999999999886 C49.67311096191398,63.999999999999886 63.999999999999886,49.67311096191398 63.999999999999886,31.999999999999943 C63.999999999999886,14.326888084411596 49.67311096191398,0.0 31.999999999999943,0.0"
                                                    style="fill:#ffffff;opacity:1.0;"></path>
                                            </g>
                                        </svg></div>
                                </div>
                            </div>
                            <div id="QgmiAAICJvTy0ze5" style="display:grid;position:relative;grid-area:3 / 3 / 4 / 4;">
                                <div id="dgv89fY3xrwPp9us" style="z-index:11;">
                                    <div id="Mt5s65MIRQoKyCUX" style="padding-top:100%;transform:rotate(-90deg);">
                                        <div id="JJ86aQncFhzY33zB"
                                            style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                                id="cY931L5dyI9OMqyz" viewBox="0 0 64.0 64.0"
                                                style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                                <g id="IvOuzAckMJUYYpfy" style="transform:scale(1, 1);">
                                                    <path id="rSdj6mG50RReyvhZ"
                                                        d="M31.99999999999998,0.0 C14.326888084411612,0.0 0.0,14.326888084411612 0.0,31.99999999999998 C0.0,49.67311096191403 14.326888084411612,63.99999999999996 31.99999999999998,63.99999999999996 C49.67311096191403,63.99999999999996 63.99999999999996,49.67311096191403 63.99999999999996,31.99999999999998 C63.99999999999996,14.326888084411612 49.67311096191403,0.0 31.99999999999998,0.0"
                                                        style="fill:#4db95f;opacity:1.0;"></path>
                                                </g>
                                            </svg></div>
                                    </div>
                                </div>
                                <div id="GYWoD7XprgJxXYqF" style="z-index:35;">
                                    <div id="JNJOyzXfp4JL32d0"
                                        style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                        <div id="fvu51JXP4Pj7yu9m"
                                            style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                            <p id="cbxMnqLL4OOUXekw"
                                                style="margin-left:0em;text-transform:uppercase;color:#000000;letter-spacing:0em;line-height:1.4em;direction:ltr;text-align:center;">
                                                <span id="MruvzkiTWYdfVcBM"
                                                    style="text-decoration-line:none;color:#000000;font-weight:400;font-style:normal;">E</span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="S89WBjv3O0eVos4h">
                    <div id="ghlMhjZ3OMedXq5g" style="display:grid;position:relative;">
                        <div id="wCaWT14stPntKisj" style="z-index:5;">
                            <div id="TMFuKXDt0i7DcdyA" style="padding-top:17.31923474%;transform:rotate(0deg);">
                                <div id="BYP1NWbIEgbXRUPJ"
                                    style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                        id="Yy8YLGroThBgLQxD" viewBox="0 0 63.691 11.0308"
                                        style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                        <g id="xk5Np5MJ5QbNQAWM" style="transform:scale(1, 1);">
                                            <path id="kimSmxWDuwkZwkx4"
                                                d="M0.0,0.0 L63.69096131883937,0.0 L63.69096131883937,11.030787097562367 L0.0,11.030787097562367 L0.0,0.0"
                                                style="fill:#161616;opacity:1.0;"></path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                        <div id="SnEezFYWBGkFWItX" style="z-index:36;">
                            <div id="fZOry2rVmlOyU9Bt"
                                style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                <div id="Kum6RWUb099hzxGq"
                                    style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                    <p id="fjtxGNWIHeDVgXc9"
                                        style="color:#ffffff;letter-spacing:0em;line-height:1.4em;text-align:center;">
                                        <span id="Ae4fPlEzgKehjdlv" style="color:#ffffff;">Intereses</span><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="yu8fnsQ2YrdsTKxf">
                    <div id="u3tEwjpfTTBJefly" style="display:grid;position:relative;">
                        <div id="wP6bBXpSOZaTJm2d" style="z-index:2;">
                            <div id="G0LMgTzpBlnqK8WG" style="padding-top:17.58415389%;transform:rotate(0deg);">
                                <div id="KyfzWLquq8iouDGG"
                                    style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                        id="MjWU2AvvYRP9JwJY" viewBox="0 0 62.7314 11.0308"
                                        style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                        <g id="HJl2JqcXTRTfAMFJ" style="transform:scale(1, 1);">
                                            <path id="VxWfPQxqX5oBrZ9D"
                                                d="M0.0,0.0 L62.7314067197171,0.0 L62.7314067197171,11.030787097562353 L0.0,11.030787097562353 L0.0,0.0"
                                                style="fill:#ec2b2b;opacity:1.0;"></path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                        <div id="khO98YhzucP28UzD" style="z-index:37;">
                            <div id="NqCI8T9r9MOpCXfz"
                                style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                <div id="Qi13tEvW0MZijo8n"
                                    style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                    <p id="a4Sr1Jm3BS6LHkml"
                                        style="color:#fefefe;letter-spacing:0em;line-height:1.4em;text-align:center;">
                                        <span id="oXiqUJvMaC8HylQq" style="color:#fefefe;">Habilidades</span><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="im939GzEr4IOYXQn" style="z-index:24;">
                    <div id="kPg5oP8INu5sSYgc" style="padding-top:1.09299107%;transform:rotate(0deg);">
                        <div id="L8K9aGeQ7R3arvmL" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <svg id="THYabHaf0w6LE17I" viewBox="0 0 139.65799332357597 1.5264494021433848"
                                preserveAspectRatio="none"
                                style="overflow:visible;display:block;width:100%;min-height:1px;fill:#fccf19;opacity:1.0;stroke:#fccf19;height:100%;">
                                <g id="txscRW75PStd5vOi">
                                    <path d="M0.5018812910503005,0.5018812910501896 L139.15611203252578,1.0245681110931384"
                                        style="stroke-dasharray:0,2;stroke-width:1px;fill:none;stroke-linecap:round;">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="IyQF39zhAkW0zYiV" style="z-index:25;">
                    <div id="Q7mdD2mt0Fa1OxMO" style="padding-top:3.94984861%;transform:rotate(0deg);">
                        <div id="nHGHrG8P12PYCx4p" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <svg id="XYGAaukG2ukm2RR6" viewBox="0 0 139.51743770123517 5.510727567322078"
                                preserveAspectRatio="none"
                                style="overflow:visible;display:block;width:100%;min-height:1px;fill:#4db95f;opacity:1.0;stroke:#4db95f;height:100%;">
                                <g id="InQY68UY6CgC7Upm">
                                    <path d="M1.0248522199901826,1.024852219990168 L138.492585481245,4.485875347331911"
                                        style="stroke-dasharray:0,4;stroke-width:2px;fill:none;stroke-linecap:round;">
                                    </path>
                                </g>
                            </svg>
                        </div>
                    </div>
                </div>
                <div id="cQqKSmIBLBMVnTkT" style="z-index: 39;">
                    <div id="oWKcACpk5olmvMef" style="transform: rotate(0deg); width: 100%; box-sizing: border-box; height: 100%;">
                        <div id="QzNMH6qB800ouchQ" style="flex-direction: column; display: flex; width: 100%; justify-content: flex-start; opacity: 1.0; height: 100%;">
                            <ul id="VWK7l5LufJKIUsw0">
                                <?php
                                $interests = json_decode($user->interests);
                                ?>
                                <?php if(is_array($interests)): ?>
                                    <?php $__currentLoopData = $interests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $interest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li style="margin-left: 1.7em; color: #000000; list-style-type: disc;line-height: 1.4em;">
                                            <span><?php echo e($interest->interest); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>



                <div id="wnInq9Aj6s1yZzw2">
                    <div id="oyr5mNF0MiOtrdnj" style="display:grid;position:relative;">
                        <div id="OC4qDn25QgnAp3Q3" style="z-index:3;">
                            <div id="giPCyMBP8NJssDqT" style="padding-top:17.44425761%;transform:rotate(0deg);">
                                <div id="kGoSJAFTqQ8gRB4I"
                                    style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                        id="CUQJ4UxvS3vppLg9" viewBox="0 0 63.2345 11.0308"
                                        style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                        <g id="WUv6pq2J2wx3Oybd" style="transform:scale(1, 1);">
                                            <path id="CE5FAPYn2gTGRpjK"
                                                d="M0.0,0.0 L63.234488655110084,0.0 L63.234488655110084,11.030787097562367 L0.0,11.030787097562367 L0.0,0.0"
                                                style="fill:#4db95f;opacity:1.0;"></path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                        <div id="V4kEApiE57Ydo6sM" style="z-index:29;">
                            <div id="Cmz1RaKLDM5g9Tiq"
                                style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                <div id="cAfJcZ4c2BlybNCU"
                                    style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                    <p id="MJvxCrNpuXeiN7kV"
                                        style="color:#fefefe;letter-spacing:0em;line-height:1.4em;text-align:center;">
                                        <span id="sVIgeeJQfFZ6Aztm" style="color:#fefefe;">Educación</span><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="XSppRDPNLCh6yrsP">
                    <div id="azrtOIi29u9AiPcb" style="display:grid;position:relative;">
                        <div id="ZhIwCl50SAZ9HT7W" style="z-index:4;">
                            <div id="XZECl5pAQtOFTF4k" style="padding-top:17.32009806%;transform:rotate(0deg);">
                                <div id="zf8Wjf0J9hU9yg0Z"
                                    style="top:0px;left:0px;width:100%;position:absolute;height:100%;"><svg
                                        id="eCojg0Z8NVE5Jm2y" viewBox="0 0 63.6878 11.0308"
                                        style="overflow:hidden;top:0%;left:0%;width:100%;position:absolute;opacity:1.0;height:100%;">
                                        <g id="GLp1HYJECX7qBYWE" style="transform:scale(1, 1);">
                                            <path id="NK3eIfERjitQzZwX"
                                                d="M0.0,0.0 L63.6877866185838,0.0 L63.6877866185838,11.030787097562367 L0.0,11.030787097562367 L0.0,0.0"
                                                style="fill:#fccf19;opacity:1.0;"></path>
                                        </g>
                                    </svg></div>
                            </div>
                        </div>
                        <div id="IuAcxWgdwm6nMetu" style="z-index:38;">
                            <div id="EYkj2Q34c5ZbxMlG"
                                style="transform:rotate(0deg);width:100%;box-sizing:border-box;height:100%;">
                                <div id="IwkUbXDi90u0cgTt"
                                    style="flex-direction:column;display:flex;width:100%;justify-content:flex-start;opacity:1.0;height:100%;">
                                    <p id="so4JdNubJCmB3R0L"
                                        style="color:#fefefe;letter-spacing:0em;line-height:1.4em;text-align:center;">
                                        <span id="NOsxob2rn3Sdo3lW" style="color:#fefefe;">Experiencia
                                            Profesional</span><br>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="kbGF6LCy1OdS5gwW" style="z-index: 32;">
                    <div id="lyIyk8IMYCjq3XJh" style="transform: rotate(0deg); width: 100%; box-sizing: border-box; height: 100%;">
                        <div id="Teu1dT64idmsHdzA" style="flex-direction: column; display: flex; width: 100%; justify-content: flex-start; opacity: 1.0; height: 100%;">
                            <ul id="VWK7l5LufJKIUsw0">
                                <?php
                                $experiences = json_decode($user->experiences);
                                ?>
                                <?php if(is_array($experiences)): ?>
                                    <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li style="margin-left: 1.7em; color: #000000; list-style-type: disc; line-height: 1.4em;">
                                            <span><?php echo e($experience->experience); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="F6f12VgPp2KdXoKD" style="z-index: 31;">
                    <div id="UJ545QPtzcwwa600" style="transform: rotate(0deg); width: 100%; box-sizing: border-box; height: 100%;">
                        <div id="NtQFkZB9ajuTjgDD" style="flex-direction: column; display: flex; width: 100%; justify-content: flex-start; opacity: 1.0; height: 100%;">
                            <ul id="VWK7l5LufJKIUsw0">
                                <?php
                                $educations = json_decode($user->educations);
                                ?>
                                <?php if(is_array($educations)): ?>
                                    <?php $__currentLoopData = $educations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li style="margin-left: 1.7em; color: #000000; list-style-type: disc; line-height: 1.4em;">
                                            <span><?php echo e($education->education); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="nnyipCHFCqb6cObT" style="z-index: 30;">
                    <div id="WSky9FHDr8WlICAX" style="transform: rotate(0deg); width: 100%; box-sizing: border-box; height: 100%;">
                        <div id="XB4jHZS6XXOjcfzu" style="flex-direction: column; display: flex; width: 100%; justify-content: flex-start; opacity: 1.0; height: 100%;">
                            <ul id="VWK7l5LufJKIUsw0">
                                <?php
                                $skills = json_decode($user->skills);
                                ?>
                                <?php if(is_array($skills)): ?>
                                    <?php $__currentLoopData = $skills; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $skill): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li style="margin-left: 1.7em; color: #000000; list-style-type: disc; line-height: 1.4em;">
                                            <span><?php echo e($skill->skill); ?></span>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div id="qE43gFLjN2c9eqqj" style="z-index:63;">
                    <div id="oqMTE25687AQoPjX" style="padding-top:21.7644272%;transform:rotate(0deg);">
                        <div id="OH2FVBKe2j4HHcqC" style="top:0px;left:0px;width:100%;position:absolute;height:100%;">
                            <div id="tA0iaJgcSk2IrYnm" style="width:100%;opacity:1.0;height:100%;">
                                <div id="cRTzopBBbmlGLksH"
                                    style="transform:scale(1, 1);overflow:hidden;width:100%;position:relative;height:100%;">
                                    <div id="xBBvsnKuV4RNxXey"
                                        style="transform:rotate(0deg);top:-67.7605554%;left:0%;width:108.73031671%;position:absolute;height:277.54340119%;opacity:1.0;animation:pulse 1.5s ease-in-out infinite;">
                                        <img src="<?php echo e(asset('images/e973ec3604184aa987e0aba85d4c9a24.webp')); ?>" title="imagen"
                                            loading="lazy" style="display:block;object-fit:cover;width:100%;height:100%;">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
        <?php echo $__env->make('layouts.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('app', ['activePage' => 'inicio', 'titlePage' => __('EMPRENDE')], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/STEM--main/resources/views/entreProfes/EntreProfes.blade.php ENDPATH**/ ?>