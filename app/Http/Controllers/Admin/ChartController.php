<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Chart;
use App\Trigger;
use App\ChartTrigger;
use App\User;

class ChartController extends Controller
{
    
    //クライエント情報の詳細を表示させる
    public function detail(Request $request)
    {
        // Chart Modelからデータを取得する
        $chart= Chart::find($request->id);
        if (empty($chart)) {
            abort(404);    
        }
        return view('admin.chart.detail', ['chart_form' => $chart]);
    }
    //クライアント情報の編集画面
    public function edit(Request $request)
    {
        // Chart Modelからデータを取得する
        $chart= Chart::find($request->id);
        if (empty($chart)) {
            abort(404);    
        }
        $selected_triggers=$chart->triggers()->pluck("id")->toArray();
        $triggers=Trigger::all();
        return view('admin.chart.edit', ['chart_form' => $chart,'selected_triggers' => $selected_triggers,'triggers' => $triggers]);
    }

    //編集画面から送信されたフォームデータを処理
    public function update(Request $request)
        {
          //  Modelからデータを取得する
          $chart = Chart::find($request->id);
          // 送信されてきたフォームデータを格納する
          if (empty($chart)) {
            abort(404);    
        }
          $selected_triggers=$chart->triggers()->pluck("id")->toArray();
          $triggers=Trigger::all();
          $chart_form = $request->all();
          $triggers = $chart_form['trigger'];
          unset($chart_form['_token']);
          unset($chart_form['trigger']);
          $chart->fill($chart_form);
          $chart->save();
          $chart->triggers()->sync($triggers);
          
          return redirect('admin/salon/chart?id=' . $chart->id);
        }
    
}
