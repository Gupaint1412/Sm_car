<script>
    
    var inputIdCard = document.getElementById('idcard').value;
    const emailInput = document.getElementById("email"); // Replace "email" with the actual ID
    const inputEmail = emailInput.value.trim(); // Remove any leading/trailing spaces
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+\.?[^\s@]*$/;
    var btn_register = document.getElementById('btn_register');
    const id_card_jsonData = @php echo $id_card_user; @endphp;
    const email_jsonData = @php echo $email_user; @endphp;
    const password = document.getElementById("password").value;
    var confirmPassword = document.getElementById("password-confirm");
    // console.log(id_card_jsonData)
    // console.log(email_jsonData)
    
    $(document).ready(function(){ 
        let idcard_w = false;
        let email_w = false;
        let password_w = false;
        
        $('#idcard').on('keyup',function(){    
              if($(this).val() != '' && $(this).val().length == 13){
                id = $(this).val().replace(/-/g,"");
                var result_pattern = Script_checkID(id);
                const isDuplicate = checkDuplicates($(this).val(), id_card_jsonData);
                    if(result_pattern === true && isDuplicate === true){
                        $('span.error').removeClass('true').text('เลขบัตรซ้ำในระบบ กรุณาใช้เลขอื่น');
                        return false
                        // console.log("เลขบัตรถูกต้อง แต่ซ้ำในระบบ")
                        // console.log(id_box)                    
                    }else if(result_pattern === true && isDuplicate === false){
                        $('span.error').addClass('true').text('เลขบัตรถูกต้อง พร้อมใช้งาน');
                        return true
                        // console.log("เลขบัตรถูกต้อง และไม่ซ้ำ")
                        // console.log(id_box)                    
                    }else if(result_pattern === false && isDuplicate === true){
                        $('span.error').removeClass('true').text('เลขบัตรผิด ไม่พร้อมใช้งาน');
                        return false                    
                        // console.log("เลขบัตรผิด และซ้ำในระบบ")
                        // console.log(id_box)
                    }else if(result_pattern === false && isDuplicate === false){
                        $('span.error').removeClass('true').text('เลขบัตรผิด ไม่พร้อมใช้งาน');
                        return false
                        // console.log("เลขบัตรผิด และไม่ซ้ำในระบบ")
                        // console.log(id_box)
                    }
              }
              else {           
                $('span.error').removeClass('true').text('ตัวเลขไม่ถึง 13 หลัก');
                return false
                // console.log("ตัวเลขไม่ถึง 13 หลัก");
                // console.log(id_box)
              }          
        })
        $('#email').on('keyup',function(){
            const isValidEmail = emailRegex.test($(this).val());
            if(isValidEmail === true) {            
                    const email_Duplicate = checkDuplicates_mail($(this).val(), email_jsonData);
                    if(email_Duplicate === true){
                        $('span.error_email').removeClass('true').text('อีเมล ของท่านซ้ำในระบบกรุณาใช้อีเมลอื่น')
                        return false
                        // console.log("email ซ้ำ")
                        // console.log(email_Duplicate)                    
                    }else{
                        $('span.error_email').addClass('true').text('อีเมลของท่านพร้อมใช้งาน')   
                        return true
                        // console.log("email พร้อมใช้งาน")
                        // console.log(email_Duplicate)
                    }
                } 
            else {            
                $('span.error_email').removeClass('true').text('กรุณาใส่อีเมลให้ถูกต้อง')
                return false
                // console.log("กรุณาใส่ email ให้ถูกต้อง");
                }
        })
        $('#password, #password-confirm').on('keyup', function() {
            const password = $('#password').val();
            const confirmPassword = $('#password-confirm').val();
    
            if(password.length < 9){
                $('span.error_password').removeClass('true').text('กรุณาตัวอักษรอย่างน้อย 9 ตัว')
                confirmPassword.disabled= true;
                return false
            }
            else{
                $('span.error_password').removeClass('true').text('')
                confirmPassword.disabled= false;
                if (password !== confirmPassword) {               
                    $('span.error_password').removeClass('true').text('รหัสผ่านไม่ตรงกัน')
                    return false
                    // Passwords don't match
                    // console.log('not match')
                } else {                
                    $('span.error_password').addClass('true').text('รหัสผ่านถูกต้อง')
                    return true
                    // console.log(password_box)      
                }
            }
        
        });

        $('#idcard').on('change', function(){
            console.log(idcard_m);
        });
    
        if(id_box === true && email_box === true && password_box === true){
            btn_register.disabled= false
        }else{
            btn_register.disabled= true
        }
    
        
    });
           
    //--------------- Function to check pattern ID Card
        function Script_checkID(id){
            if(id.substring(0,1)== 0) return false;
            if(id.length != 13) return false;
                for(i=0, sum=0; i < 12; i++)
                    sum += parseFloat(id.charAt(i))*(13-i);
            if((11-sum%11)%10!=parseFloat(id.charAt(12))) return false;
                return true;
        }
    
    //--------------- Function to check for duplicates ID Card
        function checkDuplicates(inputIdCard, id_card_jsonData) {
            return id_card_jsonData.some(object => object.id_card === inputIdCard);
        }
    //--------------- Function to check for duplicates Email
        function checkDuplicates_mail(inputEmail, email_jsonData) {
            return email_jsonData.some(object => object.email === inputEmail);
        }
    </script>