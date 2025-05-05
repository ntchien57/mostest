<?php

namespace App\Admin\Actions;

use Encore\Admin\Widgets\Dropdown;

class ThemHocSinhButton extends \Encore\Admin\Widgets\Widget
{
    protected $maLH;

    public function __construct($maLH)
    {
        $this->maLH = $maLH;
    }

    public function render()
    {
        $url = admin_url('chi-tiet-lop-hoc/create?maLH=' . $this->maLH);

        return "<a class='btn btn-success' href='{$url}'><i class='fa fa-plus'></i> Thêm học sinh</a>";
    }
}
