<?php require 'db.php'; ?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>نظام تسجيل الطلاب</title>
    <style>
        body { font-family: sans-serif; background: #f4f7f6; padding: 20px; }
        .container { max-width: 800px; margin: auto; background: #fff; padding: 20px; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        input, button { width: 100%; padding: 10px; margin: 5px 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        .delete-btn { color: red; text-decoration: none; }
    </style>
</head>
<body>
<div class="container">
    <h2>تسجيل طالب جديد</h2>
    <form action="process.php" method="POST">
        <input type="text" name="student_name" placeholder="اسم الطالب" required>
        <input type="email" name="email" placeholder="البريد الإلكتروني" required>
        <input type="text" name="student_number" placeholder="رقم الطالب" required>
        <input type="number" name="year_of_study" placeholder="السنة الدراسية" required>
        <input type="text" name="batch_name" placeholder="الدفعة" required>
        <button type="submit" name="submit">حفظ الطالب</button>
    </form>

    <h2>قائمة الطلاب</h2>
    <table>
        <tr><th>الاسم</th><th>البريد</th><th>الرقم</th><th>الإجراء</th></tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM students");
        while ($row = $stmt->fetch()) {
            echo "<tr>
                <td>{$row['student_name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['student_number']}</td>
                <td><a href='process.php?delete={$row['id']}' class='delete-btn' onclick='return confirm(\"هل أنت متأكد؟\")'>حذف</a></td>
            </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>