<!DOCTYPE html>
<html>
   <head>
      <title>Mail</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div style="max-width:640px; margin:0 auto;">
         <div style="/*width:620px;*/background:#F5F5F3; /*padding: 0px 10px;*/ border:1px solid #dcd7d7;">
            <div style="float: none; text-align: center; margin-top: 0px; background:url('{{ URL::to('#') }}') repeat center center">
               <img src="http://staging.deeepocean.co.in/assets/img/logo-d-long.png" >
            </div>
         </div>
         <div style="max-width:620px; border:1px solid #f0f0f0; margin:0 0; padding:15px; ">
            <h1 style="font-family:Arial; font-size:16px; font-weight:500; /*color:#8ccd56;*/ margin:5px 0 12px 0;">Hey {{@$data['name']}},</h1>
            <div style="display:block; overflow:hidden; width:100%;">
               <p style="font-family:Arial; font-size:14px; font-weight:500; color:#000;margin: 15px 0px 15px;">

               </p>
            </div>
            <div style="display:block;overflow:hidden; width:100%; margin: 5px 0px 10px 0px;">
               <p style="font-family:Arial; font-size:14px; font-weight:500; text-align:center; color:#000;padding: 4px; background:#f5f5f5;">
               </p>

              
                   <p>
                    Your profile updated. Updated Mobile number is <b> {{@$data['mobile']}}</b> and updated email is <b> {{@$data['email']}}</b>
                  </p>
                   </center>
                   
                   

                
               </p>
            </div>
            <p style="font-family:Arial; font-size:14px; font-weight:500; color:#363839;margin: 0px 0px 10px 0px;">Thank you,</p>
            <p style="font-family:Arial; font-size:14px; font-weight:500; color:#363839;margin: 0px 0px 10px 0px;">{{env('APP_NAME')}}</p>
         </div>
      </div>
   </body>
</html>
