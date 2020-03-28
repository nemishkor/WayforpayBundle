Installation
============

Create config file ``wayforpay.yaml`` in config/packages with content:

wayforpay:
   merchantSecretKey: '%env(WAYFORPAY_MERCHANT_SECRET_KEY)%'
   merchantAccount: 'test_merch_n1'
   merchantSecretKey: 'flk3409refn54t54t*FNJRET'

Define your WAYFORPAY_MERCHANT_SECRET_KEY in .env.local. For example:

###> nemishkor/wayforpay-bundle ###
WAYFORPAY_MERCHANT_SECRET_KEY=xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx
###< nemishkor/wayforpay-bundle ###
