<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Validator;
use App\Models\Role;
use App\Models\Right;
use App\Models\RoleRight;
use App\Models\Setting;
use App\Models\Otp;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Category;
use App\Models\ProductPart;
use App\Models\Translation;
use App\Models\Company;
use App\Models\MyFest;
use App\Models\PartnerProduct;
// use Auth;

class Helper
{

    public static function hasRight($right, $role_id = null)
    {
        if ($role_id != null) {
            $role = $role_id;
        } else {
            $role = \Auth::user()->role;
        }
        $right = Right::where('name', $right)->first();
        if (RoleRight::where('role_id', $role)->where('right_id', $right->id)->where('permission', 1)->exists()) {
            return true;
        } else {
            return false;
        }
    }

    public static function getSettings($key)
    {
        $settings = Setting::where('key', $key)->first();
        if (!is_null($settings)) {
            return $settings->value;
        } else {
            return false;
        }
    }


    public static function sendEmail($email, $subject, $data, $template = 'default')
    {
        Mail::send('mails.' . $template, ['data' => $data], function ($message) use ($email, $subject) {
            $message->from(env('MAIL_FROM_ADDRESS'), $subject);
            $message->to($email)->subject($subject);
        });
    }

    public static function checkotp($email, $otp)
    {
        $otp = Otp::where('email', $email)->where('otp', $otp)->where('status', 0)->first();
        if ($otp) {
            return true;
        }
    }

    public static function priceFaterOffer($product_id)
    {
        $product = Product::find($product_id);
        $dicount = 0;

        if (auth()->check() == true) {
            $user = Auth::user();
            $partner = Company::where('user_id', $user->id)->where('status', 1)->first();
            if ($partner) {

                $product_assing = PartnerProduct::where('company_id', $partner->company_id)->where('product_id', $product->id)->first();

                if (isset($product_assing->discount_price) && $product_assing->discount_price > 0) {
                    if ($product_assing->discount_type && $product_assing->discount_type == 'percent') {
                        $dicount = $product->price - ($product_assing->discount_price * $product->price) / 100;
                    } else if ($product_assing->discount_type && $product_assing->discount_type == 'amount') {
                        $dicount = $product->price - $product_assing->discount_price;
                    } else {
                        $dicount = $product->price;
                    }

                    return $dicount;
                } else if (isset($partner->discount) && $partner->discount > 0) {
                    if ($partner->discount_type && $partner->discount_type == 'percent') {
                        $dicount = $product->price - ($partner->discount * $product->price) / 100;
                    } else if ($partner->discount_type && $partner->discount_type == 'amount') {
                        $dicount = $product->price - $partner->discount;
                    } else {
                        $dicount = $product->price;
                    }

                    return $dicount;
                } else if (isset($product->discount) && $product->discount > 0) {
                    if ($product->discount_type && $product->discount_type == 'percent') {
                        $dicount = $product->price - ($product->discount * $product->price) / 100;
                    } else if ($product->discount_type && $product->discount_type == 'amount') {
                        $dicount = $product->price - $product->discount;
                    } else {
                        $dicount = $product->price;
                    }

                    return $dicount;
                } else {
                    $dicount = $product->price;
                    return $dicount;
                }
            } else {

                $dicount = $product->price;
                return $dicount;
            }
        } else {

            $dicount = $product->price;
            return $dicount;
        }
    }


    public static function productDiscountAmount($product_id)
    {
        $product = Product::find($product_id);
        $dicount = 0;

        if (auth()->check()) {
            $user = Auth::user();
            $partner = Company::where('user_id', $user->id)->where('status', 1)->first();
            if ($partner) {

                $product_assing = PartnerProduct::where('company_id', $partner->company_id)->where('product_id', $product->id)->first();

                if (isset($product_assing->discount_price) && $product_assing->discount_price > 0) {
                    if ($product_assing->discount_type && $product_assing->discount_type == 'percent') {
                        $dicount = ($product_assing->discount_price * $product->price) / 100;
                    } else if ($product_assing->discount_type && $product_assing->discount_type == 'amount') {
                        $dicount = $product_assing->discount_price;
                    } else {
                        $dicount = $product->discount;
                    }

                    return $dicount;
                }

                if (isset($partner->discount) && $partner->discount > 0) {
                    if ($partner->discount_type && $partner->discount_type == 'percent') {
                        $dicount = ($partner->discount * $product->price) / 100;
                    } else if ($partner->discount_type && $partner->discount_type == 'amount') {
                        $dicount = $partner->discount;
                    } else {
                        $dicount = $product->discount;
                    }

                    return $dicount;
                }

                if (isset($product->discount) && $product->discount > 0) {
                    if ($product->discount_type && $product->discount_type == 'percent') {
                        $dicount = ($product->discount * $product->price) / 100;
                    } else if ($product->discount_type && $product->discount_type == 'amount') {
                        $dicount = $product->discount;
                    } else {
                        $dicount = $product->discount;
                    }

                    return $dicount;
                }
            } else {

                $dicount = $product->discount;
                return $dicount;
            }
        } else {
            return $dicount;
        }
    }

    public static function partPriceFaterOffer($part_id)
    {
        $part = ProductPart::find($part_id);
        $dicount = 0;

        if ($part->discount_type && $part->discount_type == 'percent') {
            $dicount = $part->price - ($part->discount * $part->price) / 100;
        } else if ($part->discount_type && $part->discount_type == 'amount') {
            $dicount = $part->price - $part->discount;
        }

        if ($dicount > 0) {
            return $dicount;
        } else {
            return $part->price;
        }
    }

    public static function partDiscountAmount($part_id)
    {
        $part = ProductPart::find($part_id);
        $dicount = 0;
        if ($part->discount_type && $part->discount_type == 'percent') {
            $dicount = ($part->discount * $part->price) / 100;
        } else if ($part->discount_type && $part->discount_type == 'amount') {
            $dicount = $part->discount;
        }
        return $dicount;
    }


    public static function alreadyInCart($product_id)
    {
        $return = false;
        if (session()->has('cartlist')) {
            $cartlist = session()->get('cartlist');
            if (isset($cartlist[$product_id])) {
                $return = true;
            }
        }
        return $return;
    }

    public static function getCart()
    {
        $cart = Cart::where(function ($query) {
            $query->where('session_id', Session::get('session_id'))
                ->orwhere('user_id', Session::get('user_id'));
        })->get();

        return $cart;
    }

    // Helper function to make building xml dom easier
    public static function appendXmlNode($domDocument, $parentNode, $name, $value)
    {
        $childNode      = $domDocument->createElement($name);
        $childNodeValue = $domDocument->createTextNode($value);
        $childNode->appendChild($childNodeValue);
        $parentNode->appendChild($childNode);
    }

    public static function makePayment($xmlRequest, $gatewayURL = null)
    {
        $gatewayURL = 'https://secure.nmi.com/api/transact.php';
        $APIKey = '2F822Rw39fx762MaV7Yy86jXGTC7sCDy';



        $ch = curl_init(); // Initialize curl handle
        curl_setopt($ch, CURLOPT_URL, $gatewayURL); // Set POST URL

        $headers = array();
        $headers[] = "Content-type: text/xml";
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); // Add http headers to let it know we're sending XML
        $xmlString = $xmlRequest->saveXML();
        curl_setopt($ch, CURLOPT_FAILONERROR, 1); // Fail on errors
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Allow redirects
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // Return into a variable
        curl_setopt($ch, CURLOPT_PORT, 443); // Set the port number
        curl_setopt($ch, CURLOPT_TIMEOUT, 30); // Times out after 30s
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlString); // Add XML directly in POST

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);


        // This should be unset in production use. With it on, it forces the ssl cert to be valid
        // before sending info.
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        if (!($data = curl_exec($ch))) {
            print  "curl error =>" . curl_error($ch) . "\n";
            throw new Exception(" CURL ERROR :" . curl_error($ch));
        }
        curl_close($ch);

        return $data;
    }
}
