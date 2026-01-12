<?php
session_start();

// जर युजर लॉगिन नसेल तर लॉगिनवर पाठवा
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

/*
  SAFETY FIX:
  cart मध्ये जर चुकून चुकीचा डेटा असेल तर तो इग्नोर केला जाईल
*/
$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Your Shopping Bag | TechHub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* --- Base Theme --- */
        body {
            margin: 0;
            font-family: 'Segoe UI', Roboto, sans-serif;
            background: radial-gradient(circle at top left, #1e293b, #020617);
            color: #fff;
            min-height: 100vh;
        }

        .container {
            max-width: 950px;
            margin: 60px auto;
            background: rgba(15, 23, 42, 0.7);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 30px;
            padding: 40px;
            box-shadow: 0 40px 100px rgba(0,0,0,0.7);
            animation: fadeInPage 0.6s ease-out;
        }

        @keyframes fadeInPage {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        h1 { text-align: center; margin-bottom: 30px; font-weight: 800; color: #f8fafc; }

        /* --- Table Styling --- */
        table { width: 100%; border-collapse: collapse; }
        th { color: #94a3b8; padding: 20px; border-bottom: 2px solid #1e293b; text-transform: uppercase; font-size: 13px; }
        td { padding: 20px; border-bottom: 1px solid rgba(255,255,255,0.05); text-align: center; }

        .remove-btn {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #ef4444;
            padding: 10px 18px;
            border-radius: 12px;
            color: #ef4444;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        .remove-btn:hover { background: #ef4444; color: #fff; transform: scale(1.05); }

        /* --- Summary Section --- */
        .summary {
            margin-top: 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(255,255,255,0.03);
            padding: 25px;
            border-radius: 20px;
        }

        .total { font-size: 26px; font-weight: bold; color: #4ade80; }

        .actions a { padding: 14px 28px; border-radius: 20px; text-decoration: none; font-weight: bold; transition: 0.3s; display: inline-block; }
        .continue { color: #94a3b8; border: 1px solid #334155; margin-right: 15px; }
        .checkout { background: linear-gradient(135deg, #6366f1, #a855f7); color: #fff; box-shadow: 0 10px 20px rgba(99, 102, 241, 0.3); }
        .checkout:hover { transform: translateY(-3px); }

        /* --- MODERN ATTRACTIVE POPUP --- */
        #deleteOverlay {
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(0, 0, 0, 0.8);
            backdrop-filter: blur(10px);
            z-index: 9998;
            display: none;
            opacity: 0;
            transition: 0.3s;
        }

        #deleteModal {
            position: fixed;
            top: 50%; left: 50%;
            transform: translate(-50%, -50%) scale(0.7);
            background: #1e293b;
            border: 1px solid rgba(239, 68, 68, 0.4);
            padding: 40px;
            border-radius: 32px;
            width: 340px;
            text-align: center;
            z-index: 9999;
            display: none;
            box-shadow: 0 25px 50px rgba(0,0,0,0.5);
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        #deleteOverlay.show { display: block; opacity: 1; }
        #deleteModal.show { display: block; transform: translate(-50%, -50%) scale(1); }

        .modal-icon { font-size: 50px; margin-bottom: 20px; display: block; animation: shake 0.5s ease infinite alternate; }
        @keyframes shake { from { transform: rotate(-5deg); } to { transform: rotate(5deg); } }

        .modal-btns { display: flex; flex-direction: column; gap: 12px; margin-top: 30px; }
        .btn-confirm { background: #ef4444; color: white; border: none; padding: 14px; border-radius: 15px; font-weight: bold; cursor: pointer; }
        .btn-cancel { background: transparent; color: #94a3b8; border: 1px solid #334155; padding: 12px; border-radius: 15px; cursor: pointer; }
    </style>
</head>
<body>

<div class="container">
    <h1>👜 Your Shopping Bag</h1>

    <?php if (empty($cart)): ?>
        <div style="text-align:center; padding:40px 0;">
            <p style="color:#94a3b8; font-size:18px; margin-bottom:25px;">
                🛒 Your cart is empty
            </p>
            <a href="index.php" 
               style="display:inline-block; padding:14px 30px; border-radius:30px; background:linear-gradient(135deg,#6366f1,#8b5cf6); color:#fff; text-decoration:none; font-weight:bold;">
                ← Back To Products
            </a>
        </div>
    <?php else: ?>

        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cart as $id => $item): ?>
                    <?php
                    // 🔒 SAFETY CHECK
                    if (!is_array($item)) continue;

                    $price = (float)$item['price'];
                    $qty   = (int)$item['qty'];
                    $sub   = $price * $qty;
                    $total += $sub;
                    ?>
                    <tr>
                        <td style="font-weight:bold;"><?= htmlspecialchars($item['name']) ?></td>
                        <td>₹<?= number_format($price, 2) ?></td>
                        <td><?= $qty ?></td>
                        <td style="color:#22c55e; font-weight:bold;">₹<?= number_format($sub, 2) ?></td>
                        <td>
                            <a href="session_add.php?remove=<?= $id ?>" onclick="return confirm('Really, Do You want to remove this Product?')">
                                <button class="remove-btn">Remove</button>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="summary">
            <div class="total">
                Grand Total: ₹<?= number_format($total, 2) ?>
            </div>

            <div class="actions">
                <a href="index.php" class="continue">← Back to Home Page</a>
                <a href="checkout.php" class="checkout">Checkout Now →</a>
            </div>
        </div>

    <?php endif; ?>
</div>

</body>
</html>