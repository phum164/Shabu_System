// แยกหมวดหมู่
document.addEventListener('DOMContentLoaded', function() {
  document.querySelectorAll('.catagory a').forEach(link => {
      link.addEventListener('click', function(e) {
          e.preventDefault();
          document.querySelectorAll('.catagory a').forEach(link => {
              link.classList.remove('selected');
          });
          this.classList.add('selected');
          const selectedTypeId = this.getAttribute('data-category');
          document.querySelectorAll('.menu-item').forEach(item => {
              item.style.display = 'none';
          });
          if (selectedTypeId === 'all') {
              document.querySelectorAll('.menu-item').forEach(item => {
                  item.style.display = 'block';
              });
          } else {
              document.querySelectorAll(`.menu-item[data-category="${selectedTypeId}"]`).forEach(item => {
                  item.style.display = 'block';
              });
          }
      });
  });
});

// เพิ่มลบจำนวน
function changeAmount(change, event) {
  const input = event.target.closest('.adbtn').querySelector('.numo');
  let currentValue = parseInt(input.value, 10);
  currentValue += change;
  if (currentValue < 1) {
      currentValue = 1;
  }
  input.value = currentValue;

  // อัปเดต cartItems
  const menuId = event.target.closest('.oderlist-item').getAttribute('data-id');
  const itemIndex = cartItems.findIndex(item => item.menuId === menuId);
  if (itemIndex !== -1) {
      cartItems[itemIndex].amount = currentValue; // อัปเดตจำนวนใน cartItems
  }
}


// เพิ่มรายการไปที่ตะกร้า
let cartItems = []; // สร้างอาร์เรย์เพื่อเก็บข้อมูลตะกร้า
function addItemToSidebar(imageSrc, name, quantity, menuId) {
  const existingItemIndex = cartItems.findIndex(item => item.menuId === menuId);

  if (existingItemIndex !== -1) {
      // ถ้าพบรายการเดิม เพิ่มจำนวน
      cartItems[existingItemIndex].amount += quantity;
      const input = document.querySelector(`.oderlist-item[data-id="${menuId}"] .numo`);
      if (input) {
          input.value = cartItems[existingItemIndex].amount; // อัปเดตค่าใน input
      }
  } else {
      // ถ้าไม่พบ สร้างรายการใหม่
      const orderItem = document.createElement('div');
      orderItem.className = 'oderlist-item';
      orderItem.setAttribute('data-id', menuId); // เพิ่ม data-id เพื่ออ้างอิง
      orderItem.innerHTML = `
          <img class="imglist" src="${imageSrc}" alt="${name}">
          <div class="gbtnoder sib">
              <p>${name}</p>
              <div class="adbtn">
                  <button class="del" onclick="changeAmount(-1, event)"> - </button>
                  <input class="numo" type="number" name="amount" value="${quantity}" min="1">
                  <button class="add" onclick="changeAmount(1, event)"> + </button>
                  <button class="deletelist" onclick="deleteItem(event)"><i class="bi bi-trash3-fill"></i></button>
              </div>
          </div>
      `;
      document.querySelector('.oderlist').appendChild(orderItem);
      // เพิ่มข้อมูลลงใน cartItems
      cartItems.push({
          menuId: menuId,
          amount: quantity // เก็บเฉพาะ menuId กับ amount
      });
  }
}

// เมื่อกดเพิ่มรายการ
document.querySelectorAll('.oderadd').forEach(button => {
  button.addEventListener('click', function(e) {
      e.preventDefault();
      const imageSrc = this.getAttribute('data-image');
      const name = this.getAttribute('data-name');
      const menuId = this.getAttribute('data-id');
      const quantity = parseInt(this.previousElementSibling.querySelector('.numo').value, 10);

      addItemToSidebar(imageSrc, name, quantity, menuId);
  });
});

// ส่งข้อมูลเมื่อกด submit
document.getElementById('submitOrder').addEventListener('click', function() {
  const form = document.getElementById('orderForm');
  // ลบข้อมูลเก่าในฟอร์ม
  form.querySelectorAll('input[name^="menu_id"], input[name^="amount"]').forEach(input => input.remove());
  // เพิ่ม hidden input สำหรับแต่ละรายการใน cartItems
  cartItems.forEach(item => {
      const inputMenu = document.createElement('input');
      inputMenu.type = 'hidden';
      inputMenu.name = 'menu_id[]'; // ใช้ array notation
      inputMenu.value = item.menuId;
      form.appendChild(inputMenu);

      const inputAmount = document.createElement('input');
      inputAmount.type = 'hidden';
      inputAmount.name = 'amount[]'; // ใช้ array notation
      inputAmount.value = item.amount;
      form.appendChild(inputAmount);
  });
  form.submit(); 
});

// ฟังก์ชันเพื่อลบรายการ
function deleteItem(event) {
    const orderItem = event.target.closest('.oderlist-item');
    const menuId = orderItem.getAttribute('data-id');
  
    orderItem.remove();
    cartItems = cartItems.filter(item => item.menuId !== menuId);
  }