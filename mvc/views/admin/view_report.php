<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<form action="<?=url?>/order/reportBy" method="post">
    <table>
        <tr>
            <td>Mã đơn hàng</td>
            <td>Ngày mua hàng</td>
            <td>Tổng tiền</td>
            <td>Tên khách hàng</td>
        </tr>
        <?php $total = 0; ?>
        <?php foreach ($data as $item) : ?>
            <tr>
                <td><?php echo $item['mahd'] ?></td>
                <td><?php echo $item['date'] ?></td>
                <td><?php echo $item['tongtien'] ?></td>
                <td><?php echo $item['makh'] ?></td>
                <?php $total += $item['tongtien'];?>
            </tr>
        <?php endforeach; ?>
        <br><br>
            <tr>
                <td>Tổng tiền</td>
                <td></td>
                <td><?php echo $total ?></td>
            </tr>
<!--        <tr>-->
<!--            <td><input type="text" name="madh" value="--><?php //echo $data['madh'] ?? '' ?><!--"></td>-->
<!--            <td><input type="text" name="ngaymua" value="--><?php //echo $data['date']  ?? '' ?><!--"></td>-->
<!--            <td><input type="text" name="tongtien" value="--><?php //echo $data['tongtien']  ?? '' ?><!--"></td>-->
<!--            <td><input type="text" name="tenkh" value="--><?php //echo $data['makh']  ?? '' ?><!--"></td>-->
<!--        <tr>-->
    </table>
    <input type="submit" name="submit" value="Week">
    <input type="submit" name="submit" value="Month">
    <input type="submit" name="submit" value="Year">
</form>
</body>
</html>