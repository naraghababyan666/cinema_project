<?php

namespace App\Models;

use App\Mail\LoginCode;
use App\Models\Sms as Sms;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Token extends Model
{
    use HasFactory;

    const EXPIRATION_TIME = 3; // minutes

    protected $fillable = [
        'code',
        'user_id',
        'used',
    ];

    public function __construct(array $attributes = [])
    {
        if (!isset($attributes['code'])) {
            $attributes['code'] = $this->generateCode();
            $attributes['created_at'] = Carbon::now();
        }

        parent::__construct($attributes);
    }

    /**
     * Generate a six digits code
     *
     * @param int $codeLength
     * @return string
     */
    public function generateCode($codeLength = 4)
    {
        $min = pow(10, $codeLength);
        $max = $min * 10 - 1;
        $code = mt_rand($min, $max);

        return $code;
    }

    /**
     * User tokens relation
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * True if the token is not used nor expired
     *
     * @return bool
     */
    public function isValid()
    {
        return !$this->isUsed() && !$this->isExpired();
    }

    /**
     * Is the current token used
     *
     * @return bool
     */
    public function isUsed()
    {
        return $this->used;
    }

    /**
     * Is the current token expired
     *
     * @return bool
     */
    public function isExpired()
    {
        $now = Carbon::now();
        $created_at = Carbon::parse($this->updated_at);
        $diffMinutes = $created_at->diffInMinutes($now);
        return $diffMinutes > static::EXPIRATION_TIME;
    }

    public function sendSms()
    {
        if (!$this->code) {
            $this->code = $this->generateCode();
        }

        try {
            $smsru = new Sms();
            $data = new \stdClass();
            $data->to = $this->user->getPhoneNumber();
            $data->text = 'Ваш код для входа в систему ' . $this->code . '. Активен в течение 3 минут.';
            $sms = $smsru->send_one($data);

            if ($sms->status == "OK") {
                echo "Сообщение отправлено успешно. ";
                echo "ID сообщения: $sms->sms_id. ";
                echo "Ваш новый баланс: $sms->cost";
            } else {
                echo "Сообщение не отправлено. ";
                echo "Код ошибки: $sms->status_code. ";
                echo "Текст ошибки: $sms->status_text.";
            }
        } catch (\Exception $ex) {
            return false;
        }
        return true;
    }


}
