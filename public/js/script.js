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
}

// เพิ่มรายการไปที่ตะกร้า
function addItemToSidebar(imageSrc, name, quantity) {
  const existingItem = Array.from(document.querySelectorAll('.oderlist-item'))
      .find(item => item.querySelector('.imglist').getAttribute('src') === imageSrc);

  if (existingItem) {
      const input = existingItem.querySelector('.numo');
      let currentValue = parseInt(input.value, 10);
      input.value = currentValue + quantity;
  } else {
      const orderItem = document.createElement('div');
      orderItem.className = 'oderlist-item';
      orderItem.innerHTML = `
        <img class="imglist" src="${imageSrc}" alt="${name}">
        <div class="gbtnoder sib">
          <p>${name}</p>
          <div class="adbtn">
            <button class="del" onclick="changeAmount(-1, event)"> - </button>
            <input class="numo" type="number" name="amount" value="${quantity}" min="1">
            <button class="add" onclick="changeAmount(1, event)"> + </button>
          </div>
        </div>
      `;
      document.querySelector('.oderlist').appendChild(orderItem);
  }
}

// เมื่อกดเพิ่มรายการ
document.querySelectorAll('.oderadd').forEach(button => {
  button.addEventListener('click', function(e) {
      e.preventDefault();
      const imageSrc = this.getAttribute('data-image');
      const name = this.getAttribute('data-name');
      const quantity = parseInt(this.previousElementSibling.querySelector('.numo').value, 10);

      addItemToSidebar(imageSrc, name, quantity);

      document.getElementById('orderMenuId').value = this.getAttribute('data-id');
      document.getElementById('orderAmount').value = quantity;
  });
});
