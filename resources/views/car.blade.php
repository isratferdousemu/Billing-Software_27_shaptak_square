<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">


<style>
.padding {
    padding: 5rem !important
}
.image{
    background-image: url('../img/download.jpg');
    background-repeat: no-repeat;
    -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.form-control:focus {
    box-shadow: 10px 0px 0px 0px #ffffff !important;
    border-color: #4ca746
}
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
<body class="image">
<div class="padding">
    <div class="row">
        <div class="container-fluid d-flex justify-content-center">
            <div class="col-sm-8 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6"> <span>Accounting Sofware</span> </div>
                            <div class="col-md-6 text-right" style="margin-top: -5px;"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 350px">
                        <div class="form-group"> <label for="cc-number" class="control-label">Add Details</label> <textarea  class="input-lg form-control " required></textarea> </div>
                      
                           
                                <div class="form-group"> <label for="cc-exp" class="control-label">Add Amount</label> <input id="cc-exp" type="number" class="input-lg form-control cc-exp"  required> </div>
                      
                           
                   
                      
                        <div class="form-group"> <input value="Debit" type="button" class="btn btn-success btn-lg form-control" style="font-size: .8rem;"> </div>
                        <div class="form-group"> <input type="button" value="Credit" class="btn btn-success btn-lg form-control" style="font-size: .8rem;"> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>