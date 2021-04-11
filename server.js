const stripe = require("stripe")(
  "sk_test_51IeeThJuCSZSdSOwHh6bdPpvmuanSaqox5MgBaPvIdLANORmMPxoJugLQNCoUG7zAwpDPn0zWfK9WZ34pBU7aY9h00q5Gs0OTs"
);
const express = require("express");
const app = express();
app.use(express.static("."));
const YOUR_DOMAIN =
  "http://localhost/project/payment_processing/PaymentTesting/checkout.html";
app.post("/create-checkout-session", async (req, res) => {
  const session = await stripe.checkout.sessions.create({
    payment_method_types: ["card"],
    line_items: [
      {
        price_data: {
          currency: "usd",
          product_data: {
            name: "Stubborn Attachments",
            images: ["https://i.imgur.com/EHyR2nP.png"],
          },
          unit_amount: 2000,
        },
        quantity: 1,
      },
    ],
    mode: "payment",
    success_url: `${YOUR_DOMAIN}/success.html`,
    cancel_url: `${YOUR_DOMAIN}/cancel.html`,
  });
  res.json({ id: session.id });
});

app.listen(4242, () => console.log("Running on port 4242"));
