<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Pizza - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nothing+You+Could+Do" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <?php include("includes/header.php")?>
    
    <section class="shopping-cart" style="padding: 2rem; background-color: #222; color: #fff; border: 1px solid #444; border-radius: 8px; max-width: 600px; margin: 0 auto; text-align: center; box-shadow: 0px 4px 10px rgba(0,0,0,0.3);">
  <h2 style="text-align: center; font-size: 1.8rem; color: #ffcc00;">🛒 Carrito de Compras</h2>

  <div class="cart-items" style="margin-top: 1.5rem;">
    <?php if (!empty($shopcar)): ?>
      <?php foreach ($shopcar as $item): ?>
        <div class="cart-item" style="display: flex; justify-content: space-between; align-items: center; padding: 1rem 0; border-bottom: 1px solid #555;">
          <div class="item-details" style="text-align: left;">
            <p style="margin: 0; font-size: 1.2rem;">🍕 <?= esc($item['nombre_producto']) ?></p>
            <p style="margin: 0; color: #bbb; font-size: 0.9rem;">Descripción: <?= esc($item['descripcion'] ?? 'Sin descripción') ?></p>
            <div style="margin-top: 0.5rem; display: flex; align-items: center;">
              <button 
                class="quantity-btn decrease" 
                data-id="<?= esc($item['id_producto']) ?>" 
                style="background-color: #e74c3c; color: white; border: none; border-radius: 5px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; margin-right: 5px; cursor: pointer;">
                -
              </button>

              <span 
                class="item-quantity" 
                data-id="<?= esc($item['id_producto']) ?>" 
                style="width: 40px; text-align: center; font-size: 1rem;"><?= esc($item['cantidad']) ?></span>

              <button 
                class="quantity-btn increase" 
                data-id="<?= esc($item['id_producto']) ?>" 
                style="background-color: #2ecc71; color: white; border: none; border-radius: 5px; width: 30px; height: 30px; display: flex; align-items: center; justify-content: center; margin-left: 5px; cursor: pointer;">
                +
              </button>
            </div>
          </div>
          <div class="item-price">
            <p style="font-size: 1rem; color: #ffcc00;" class="unit-price"><?= number_format($item['precio_unitario'], 3) ?></p>
            <p style="font-size: 0.9rem; color: #bbb;" class="item-subtotal">Subtotal: $<?= number_format($item['subtotal'], 3) ?></p>
          </div>

          <div class="item-remove" style="text-align: right;">
            <form action="shopcar" method="POST" style="display: inline-block;">
              <input type="hidden" name="id_producto" value="<?= htmlspecialchars($item['id_producto'], ENT_QUOTES, 'UTF-8') ?>">

              <button type="submit" style="background-color: transparent; border: none; cursor: pointer;">
                <i class="fas fa-trash" style="color: #e74c3c; font-size: 1.5rem;"></i>
              </button>
            </form>
          </div>
        </div>
      <?php endforeach; ?>
    <?php else: ?>
      <p>El carrito está vacío.</p>
    <?php endif; ?>
  </div>

  <div class="total" style="margin-top: 1.5rem; font-size: 1.2rem;">
    <p style="color: #ffcc00;">Subtotal: $<span id="subtotal"><?= number_format($total, 3) ?></span></p>
    <p style="margin-top: 0.5rem; color: #ccc;">Envío: Gratis!</p>
    <p style="margin-top: 1rem; font-weight: bold; color: #ffcc00; font-size: 1.5rem;">Total: $<span id="total"><?= number_format($total , 3) ?></span></p>
    <p style="margin-top: 1rem; color: #bbb;">Cantidad total de productos: <span id="total-quantity"><?= esc($cantidad_total) ?></span></p>
  </div>

  <button id="proceed-payment-btn" style="margin-top: 2rem; padding: 0.7rem 1.5rem; background-color: #007bff; color: #fff; border: none; border-radius: 8px; cursor: pointer; font-size: 1.1rem; transition: background-color 0.3s;" <?php if (empty($shopcar)) echo 'disabled'; ?>>
    Generar Pedido
  </button>

  <div id="empty-cart-modal" class="modal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0, 0, 0, 0.6); z-index: 9999; padding: 2rem; text-align: center;">
    <div class="modal-content" style="background-color: #333; border-radius: 8px; padding: 2rem; max-width: 400px; margin: 0 auto;">
      <h3 style="color: #ffcc00;">¡Tu carrito está vacío!</h3>
      <p style="color: #fff;">Añade productos al carrito para poder proceder al pago.</p>
      <button id="close-modal-btn" style="padding: 0.5rem 1rem; background-color: #e74c3c; color: white; border: none; border-radius: 8px; cursor: pointer; font-size: 1rem; margin-top: 1rem;">
        Cerrar
      </button>
    </div>
  </div>

  <div id="payment-summary" style="display: none; background-color: #333; padding: 2rem; border-radius: 8px; margin-top: 2rem; text-align: center;">
    <h3 style="font-size: 1.6rem; color: #ffcc00;">Resumen de Pedido</h3>
    <p style="color: #fff; font-size: 1.2rem;">Total: $<span id="summary-total"><?= number_format($total , 3) ?></span></p>

    <h4 style="color: #ffcc00;">Productos:</h4>
    <div id="summary-products" style="color: #fff; margin-bottom: 1rem; text-align: center;">
      <?php foreach ($shopcar as $item): ?>
        <p>
          <strong><?= esc($item['nombre_producto']) ?>:</strong>
          <?= esc($item['cantidad']) ?> x $<?= number_format($item['precio_unitario'], 3) ?> 
          = $<?= number_format($item['subtotal'], 3) ?>
        </p>
      <?php endforeach; ?>
    </div>

    <h4 style="color: #ffcc00;">Seleccione el barrio:</h4>
    <form action="<?= base_url('shopcar/confirmarPago') ?>" method="POST" class="form-pago">
    <div class="form-group">
        <label for="barrio">Selecciona tu barrio:</label>
        <select name="barrio" required class="select-input">
            <option value="El Retiro">El Retiro</option>
            <option value="Rosales">Rosales</option>
            <option value="Chapinero Alto">Chapinero Alto</option>
            <option value="Villa Maria">Villa Maria</option>
            <option value="Altos de Suba">Altos de Suba</option>
            <option value="Rincón de Suba">Rincón de Suba</option>
            <option value="Castilla">Castilla</option>
            <option value="Timiza">Timiza</option>
            <option value="El Tintal">El Tintal</option>
        </select>
    </div>

    <div class="form-group">
        <label for="payment_method">Método de pagoo:</label>
        <select name="payment_method" required class="select-input">
            <option value="Tarjeta">Tarjeta</option>
            <option value="Efectivo">Efectivo</option>
            <option value="PSE">PSE</option>
        </select>
    </div>

    <div class="form-group">
        <button type="submit" class="btn-submit">Confirmar Pago</button>
    </div>
</form>



    <p style="font-size: 1.1rem; color: #f39c12; font-weight: bold; margin-top: 1rem;">Estado: Pendiente</p>
    <!-- <button id="confirm-payment-btn" style="margin-top: 1rem; padding: 0.7rem 1.5rem; background-color: #2ecc71; color: white; border: none; border-radius: 8px; cursor: pointer;">
      Confirmar Pago
    </button> -->
  </div>
</section>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    const decreaseButtons = document.querySelectorAll(".decrease");
    const increaseButtons = document.querySelectorAll(".increase");
    const subtotalElement = document.getElementById("subtotal");
    const totalElement = document.getElementById("total");
    const totalQuantityElement = document.getElementById("total-quantity");
    const paymentSummary = document.getElementById("payment-summary");
    const proceedPaymentBtn = document.getElementById("proceed-payment-btn");
    const emptyCartModal = document.getElementById("empty-cart-modal");
    const closeModalBtn = document.getElementById("close-modal-btn");








    
    const updateTotalAndSubtotal = () => {
      let total = 0;
      let totalQuantity = 0;

      document.querySelectorAll(".cart-item").forEach(item => {
        const quantity = parseInt(item.querySelector(".item-quantity").textContent);
        const price = parseFloat(item.querySelector(".unit-price").textContent);
        total += quantity * price;
        totalQuantity += quantity;
      });

      subtotalElement.textContent = total.toFixed(3);
      totalElement.textContent = total.toFixed(3);
      totalQuantityElement.textContent = totalQuantity;
      document.getElementById("summary-total").textContent = total.toFixed(3); // Actualizar el total en el resumen de pago
    };

    // Actualiza la cantidad total de productos en el carrito
    const updateTotalQuantity = () => {
      let totalQuantity = 0;
      document.querySelectorAll(".cart-item").forEach(item => {
        totalQuantity += parseInt(item.querySelector(".item-quantity").textContent);
      });
      totalQuantityElement.textContent = totalQuantity;
    };

    decreaseButtons.forEach(button => {
      button.addEventListener("click", () => {
        const id = button.getAttribute("data-id");
        const quantityElement = document.querySelector(`.item-quantity[data-id="${id}"]`);
        let quantity = parseInt(quantityElement.textContent);

        if (quantity > 1) {
          quantity--;
          quantityElement.textContent = quantity;
          updateTotalAndSubtotal();
          updateTotalQuantity();
        }
      });
    });

    increaseButtons.forEach(button => {
      button.addEventListener("click", () => {
        const id = button.getAttribute("data-id");
        const quantityElement = document.querySelector(`.item-quantity[data-id="${id}"]`);
        let quantity = parseInt(quantityElement.textContent);
        quantity++;
        quantityElement.textContent = quantity;
        updateTotalAndSubtotal();
        updateTotalQuantity();
      });
    });

    // Mostrar el modal si el carrito está vacío
    proceedPaymentBtn.addEventListener("click", () => {
      if (document.querySelectorAll(".cart-item").length > 0) {
        paymentSummary.style.display = "block";  // Mostrar el resumen
      } else {
        emptyCartModal.style.display = "block"; // Mostrar modal de carrito vacío
      }
    });

    // Cerrar el modal de carrito vacío
    closeModalBtn.addEventListener("click", () => {
      emptyCartModal.style.display = "none"; // Cerrar el modal
    });

    document.getElementById('confirm-payment-btn').addEventListener("click", () => {
      const selectedPaymentMethod = document.querySelector('input[name="payment-method"]:checked');
      if (selectedPaymentMethod) {
        const paymentMethod = selectedPaymentMethod.value;

        fetch('/shopcar/confirmarPago', {
  method: 'POST',
  headers: {
    'Content-Type': 'application/json',
  },
  body: JSON.stringify({ payment_method: paymentMethod })  // Enviar el método de pago
})
.then(response => response.text())  // Cambia a .text() para ver la respuesta como texto
.then(data => {
  console.log(data);  // Inspecciona lo que está recibiendo
  try {
    const jsonData = JSON.parse(data);  // Intenta parsear manualmente
    if (jsonData.success) {
      alert('Pago confirmado con éxito');
      window.location.href = '/shopcar';  // Redirigir a la página de carrito (o a otra página)
    } else {
      alert('Pago confirmado con éxito');
    }
  } catch (error) {
    console.error('Error parsing JSON:', error);
    alert('Hubo un error al procesar la respuesta del servidor.');
  }
})
.catch(error => {
  console.error('Error:', error);
  alert('Hubo un error al procesar el pago.');
});

      } else {
        alert("Por favor, selecciona un método de pago.");
      }
    });
    
  });
  
  function showMessage(message, type) {
        const messageContainer = document.getElementById('message-container');
        const messageElement = document.createElement('div');
        messageElement.className = `message ${type}`;
        messageElement.textContent = message;

        messageContainer.appendChild(messageElement);

        setTimeout(() => {
            messageElement.style.opacity = '0';
            setTimeout(() => messageElement.remove(), 500);
        }, 3000);
    }
</script>

    <footer class="ftco-footer ftco-section img">
      <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">About Us</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Recent Blog</h2>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_1.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url(images/image_2.jpg);"></a>
                <div class="text">
                  <h3 class="heading"><a href="#">Even the all-powerful Pointing has no control about</a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> Sept 15, 2018</a></div>
                    <div><a href="#"><span class="icon-person"></span> Admin</a></div>
                    <div><a href="#"><span class="icon-chat"></span> 19</a></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-2 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">Cooked</a></li>
                <li><a href="#" class="py-2 d-block">Deliver</a></li>
                <li><a href="#" class="py-2 d-block">Quality Foods</a></li>
                <li><a href="#" class="py-2 d-block">Mixed</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 mb-5 mb-md-5">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@yourdomain.com</span></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
            <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Todos los derechos reservados | Esta plantilla está diseñada por <a href="https://colorlib.com" target="_blank">Colorlib</a></p>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery-migrate-3.0.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.easing.1.3.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/scrollax.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>