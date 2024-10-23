<?php

namespace Modules\JobRequest\Helpers;

class JobRequestHelper
{
    // Draft.
    const STATUS_DRAFT = 1;

    // Waiting for deals.
    const STATUS_PUBLISH = 2;

    // Deal done, Pending to start
    const STATUS_DEAL_SELECTED = 3;

    const STATUS_PENDING = 4;

    const STATUS_PROCESSING = 5;

    const STATUS_COMPLETED = 6;

    const STATUS_CANCEL = 7;

    const TYPE_INDIVIDUAL = 1;

    const TYPE_TEAM = 2;

    const TYPE_COMPANY = 3;

    /**
     * JobRequest Status
     *
     * @return string[]
     */
    public static function allJobRequestStatus()
    {
        return [
            self::STATUS_DRAFT => 'Nháp',
            self::STATUS_PUBLISH => 'Sẵn sàng',
            self::STATUS_DEAL_SELECTED => 'Đã chọn',
            self::STATUS_PENDING => 'Đang đợi',
            self::STATUS_PROCESSING => 'Đang thực hiện',
            self::STATUS_COMPLETED => 'Đã hoàn tất',
            self::STATUS_CANCEL => 'Đã hủy',
        ];
    }

    /**
     * Get JobRequest Types
     *
     * @return string[]
     */
    public static function getJobRequestType()
    {
        return [
            self::TYPE_INDIVIDUAL => 'Cá nhân',
            self::TYPE_TEAM => 'Đội nhóm',
            self::TYPE_COMPANY => 'Công ty',
        ];
    }
}
