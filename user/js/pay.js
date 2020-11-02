const paymentForm = document.getElementById('paymentForm');

paymentForm.addEventListener("submit", payWithPaystack, false);

function payWithPaystack(e) {

  e.preventDefault();

  let handler = PaystackPop.setup({

    key: 'pk_test_faffba574ca02bf41446ab437dfc871f4406ee32',

    email: document.getElementById("email").value,

    amount: document.getElementById("amount").value * 100,

    ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you

    // label: "Optional string that replaces customer email"

    onClose: function(){

      alert('Window closed.');

    },

    callback: function(response){

      let message = 'Payment complete! Reference: ' + response.reference;
      let amount =document.getElementById("amount").value * 100;
      let projid =document.getElementById("projid").value;

      alert(message);
      window.location = "process/processpay.php?pref="+response.reference+"&amount="+amount+"&projid="+projid;

    }

  });

  handler.openIframe();

}