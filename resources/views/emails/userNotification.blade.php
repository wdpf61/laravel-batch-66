<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        /* Reset */
        body {
            margin: 0;
            padding: 0;
            background-color: #f4f6f8;
            font-family: Arial, Helvetica, sans-serif;
        }

        table {
            border-collapse: collapse;
        }

        img {
            max-width: 100%;
            height: auto;
            display: block;
        }

        /* Mobile */
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
            }
            .content {
                padding: 20px !important;
            }
            h1 {
                font-size: 22px !important;
            }
        }
    </style>
</head>
<body>

<!-- Wrapper -->
<table width="100%" bgcolor="#f4f6f8" cellpadding="0" cellspacing="0">
    <tr>
        <td align="center">

            <!-- Container -->
            <table width="600" class="container" bgcolor="#ffffff" cellpadding="0" cellspacing="0" style="margin: 30px 0; border-radius: 6px; overflow: hidden;">

                <!-- Header -->
                <tr>
                    <td bgcolor="#0d6efd" align="center" style="padding: 25px;">
                        <h1 style="color: #ffffff; margin: 0;">Welcome to Our Platform 🎉</h1>
                    </td>
                </tr>

                <!-- Body -->
                <tr>
                    <td class="content" style="padding: 30px; color: #333333;">
                        <p style="font-size: 16px; margin: 0 0 15px;">
                            Hi <strong>{{ $user->name ?? 'User' }}</strong>,
                        </p>

                        <p style="font-size: 15px; line-height: 1.6; margin: 0 0 20px;">
                           Eid Mobarak.
                        </p>

                        <!-- Button -->
                        <table cellpadding="0" cellspacing="0" align="center" style="margin: 25px auto;">
                            <tr>
                                <td bgcolor="#0d6efd" style="border-radius: 4px;">
                                    <a href="{{ $user->profilelink ?? "intelsofts.com" }}"
                                       style="display: inline-block; padding: 12px 28px; color: #ffffff; text-decoration: none; font-size: 15px; font-weight: bold;">
                                        Get Started
                                    </a>
                                </td>
                            </tr>
                        </table>

                        <p style="font-size: 14px; color: #666;">
                            If you have any questions, feel free to reply to this email.
                        </p>

                        <p style="font-size: 14px; margin-top: 25px;">
                            Best regards,<br>
                            <strong>Intellect Software </strong>
                        </p>
                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td bgcolor="#f1f1f1" align="center" style="padding: 15px; font-size: 12px; color: #777;">
                        © {{ date('Y') }} IsDB-BISEW. All rights reserved.<br>
                        Dhaka, Bangladesh
                    </td>
                </tr>

            </table>
            <!-- End Container -->

        </td>
    </tr>
</table>

</body>
</html>
