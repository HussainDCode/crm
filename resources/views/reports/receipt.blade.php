<style>
    #invoice-pos {
        background: #fff;
        width: 150mm;
        max-width: 800px;
        margin: auto;
        padding: 25px 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        /* border-radius: 8px; */
    }

    #logo {
        text-align: center;
        margin-bottom: 10px;
    }

    #logo h2 {
        font-size: 28px;
        margin: 0;
        color: #0073aa;
    }

    .info {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin: 20px 0;
        font-size: 14px;
        gap: 20px;
    }

    .info-text {
        flex: 1;
        line-height: 18px;
    }

    .info-with-logo img {
        max-width: 120px;
        height: auto;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .info,
    .order-info {
        margin: 10px 0;
        font-size: 14px;
    }

    .order-info {
        display: flex;
        justify-content: space-between;
        /* font-weight: bold; */
        margin-top: 20px;
    }

    .order-info strong {
        font-size: 16px;
    }

    h1 {
        font-size: 20px;
        margin-bottom: 5px;
        color: #222;
    }

    p {
        margin: 3px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
        font-size: 14px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        /* border: 1px solid #ddd; */
    }

    th {
        background-color: #0073aa;
        color: #fff;
    }

    .table-footer td {
        /* font-weight: bold; */
        background: #f1f3f5;
    }

    .footer {
        text-align: center;
        margin-top: 30px;
        font-size: 13px;
        color: #555;
    }

    .footer p:first-child {
        letter-spacing: 3px;
    }
</style>

<div id="invoice-pos">
    <div class="print-button-container">
        <button id="print-receipt-btn" onclick="window.print()">Print Receipt</button>
    </div>

    <div id="printed_content">
        <div id="logo">
            <h1>G.R Foam House</h1>
        </div>
    </div>

    <div class="info">
        <div class="info-text">
            <h2>Contact Us</h2>
            <p><strong>Phone:</strong> 0917-123-4567</p>
            <p><strong>Address:</strong> 1234 Street Name, City, State, Zip</p>
            <p><strong>Email:</strong> info@grfoamhouse.com</p>
        </div>
        <div class="info-with-logo">
            <img src="https://marketplace.canva.com/EAFaFUz4aKo/3/0/1600w/canva-yellow-abstract-cooking-fire-free-logo-tn1zF-_cG9c.jpg"
                alt="Company Logo">
        </div>
    </div>

    <div class="order-info">
        <div>
            <p><strong>Customer:</strong> <span id="customer-name"></span></p>
            <p><strong>Phone:</strong> <span id="customer-phone"></span></p>
        </div>
        <div>
            <p><strong>Order #:</strong> <span id="order-id"></span></p>
            <p><strong>Date:</strong> <span id="order-date"></span></p>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody id="receipt-items">
            <!-- Item rows will be inserted here dynamically -->
        </tbody>
        <tfoot>
            <tr class="table-footer">
                <td colspan="4" style="text-align: right;"><strong>Total</strong></td>
                <td><strong><span id="total-amount"></span></strong></td>
            </tr>
            <tr class="table-footer">
                <td colspan="4" style="text-align: right;">Paid Amount</td>
                <td><span id="paid-amount"></span></td>
            </tr>
            <tr class="table-footer">
                <td colspan="4" style="text-align: right;">Change</td>
                <td><span id="change-amount"></span></td>
            </tr>
        </tfoot>
    </table>

    <div class="footer">
        <p>*****************************</p>
        <p>Thank you for your purchase!</p>
        <p>Payment Method: <span id="payment-method"></span></p>
        <p>Served by: <span id="served-by"></span></p>
        <p>G.R Foam House</p>
    </div>
</div>
