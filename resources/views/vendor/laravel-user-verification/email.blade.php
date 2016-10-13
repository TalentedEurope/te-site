<!DOCTYPE html>
<html style="background: #fff; font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; font-style: normal">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta charset="utf-8">
  <title>New invitation request</title>
</head>

<body style="background: #F0F0F0; margin: 0; max-width: 100%; padding: 0; width: 100%" bgcolor="#fff">
  <style type="text/css">
    body {
      background: #F0F0F0; margin: 0; max-width: 100%; padding: 0; width: 100%;
      }
      img {
      border: 0; outline: none; text-decoration: none;
      }
  </style>
  <table style="background: #f0f0f0; margin-left: auto; margin-right: auto; max-width: 768px; padding: 0 20px; width: 100%" bgcolor="#fff">
    <tr>
      <td>
        <table class="tc" style="background: #f0f0f0; margin-left: auto; margin-right: auto; max-width: 768px; text-align: center; width: 100%" bgcolor="#fff">
          <tr>
            <td>
              <a href="#">
                <img style="width: 300px; border: 0; display: inline-block; margin: 20px 0; outline: none; text-decoration: none" src="{{ url('/img/logo-header.png') }}">
              </a>
            </td>
          </tr>
        </table>
        <table style="background: #fff; border: 0; border-collapse: separate; margin-left: auto; margin-right: auto; max-width: 768px; padding: 60px 40px; width: 100%; box-shadow: 0px 0px 6px #d7d7d7" bgcolor="#fff">
          <tr class="tc" style="text-align: left" align="left">
            <td class="f18" style="font-size: 16px">
                <p>Welcome,</p>
                <p>Thank you for signing up on Talented Europe.</p>
                <p>Please verify Your Email Address by clicking the link below.</p>
                <table border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                  <tbody>
                    <tr>
                      <td align="left">
                        <table border="0" cellpadding="0" cellspacing="0">
                          <tbody>
                            <tr>
                              <td>
                              <br/>
                              <a style="color: #fff;background-color: #337ab7;border-color: #2e6da4;padding: 10px;text-transform: uppercase;font-weight: bold;border-radius: 0;font-size: 15px;padding: 10px 10px;text-decoration: none;" href="{{ $link = route('email-verification.check', $user->verification_token) . '?email=' . urlencode($user->email) }}"> Confirm my account </a>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
            </td>
          </tr>
          <tr>
            <td style="padding-top: 30px"></td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>

</html>