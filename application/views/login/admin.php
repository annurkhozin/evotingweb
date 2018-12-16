<div class="modal-header" style="text-align:center;">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <span ><strong>Data Campaign</strong></span>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-11 center login-box"><center>
            <div>
                <div class="col-md-2"></div>
                <div class="input-group input-group-sm col-md-8">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" placeholder="Username" autofocus required id="username" class="form-control" />
                </div>
            </div></br>
            <div>
                <div class="col-md-2"></div>
                <div class="input-group input-group-sm  col-md-8">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" placeholder="Password" required id="password" class="form-control" />
                </div>
            </div></center>
        </div>
    </div>
</div>
<div class="modal-footer" style="text-align:center;">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" onclick="authadmin()" class="btn btn-primary"><i class="glyphicon glyphicon-lock"></i> Login</button>
</div>
<script>
function authadmin(){
    var username = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    
    if(username==''){
        vNotify.warning({text:'Username kosong', title:'Notify'});
    }else if(password==''){
        vNotify.warning({text:'Password kosong', title:'Notify'});
    }else{
        $.ajax({
            type:"POST",
            url:"<?php echo site_url(enkripsi('login','prosesadmin'));?>",
            data:{username:username, password:password},
            cache:false,
            success:function(a){
                if(a=='failed'){
                    vNotify.error({text: 'Username atau password sebagai administrator tidak sesuai'});
                }else{
                    window.location = a;
                }
            },
            error: function (status) {
                vNotify.error({text: status.status+' '+status.statusText, title:'Error'});
                vNotify.warning({text:'Refresh this page and try again', title:'Warning'});
            }
        });
    }
}
</script>