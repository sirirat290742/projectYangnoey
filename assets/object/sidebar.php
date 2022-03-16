<nav id="sidebar">
    <div class="sidebar-header my-4">
        <h5>ระบบจัดการร้านย่างเนย</h5>
    </div>

    <ul class="list-unstyled components">
        <li>
            <a href="console.php">DASHBOARD</a>
        </li>
        <li>
            <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">จัดการสมาชิก</a>
            <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="add_user.php">เพิ่มสมาชิก</a>
                </li>
                <li>
                    <a href="view_user.php">ดูสมาชิกทั้งหมด</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#page1Submenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">สินค้า</a>
            <ul class="collapse list-unstyled" id="page1Submenu">
                <li>
                    <a href="add_product.php">เพิ่มสินค้า</a>
                </li>
                <li>
                    <a href="add_stock.php">เพิ่มสต็อกสินค้า</a>
                </li>
                <li>
                    <a href="stock_in.php">เบิกสต็อกสินค้า</a>
                </li>
                <li>
                    <a href="view_stock.php">รายการสต็อกสินค้า</a>
                </li>
            </ul>
        </li>
    </ul>

</nav>