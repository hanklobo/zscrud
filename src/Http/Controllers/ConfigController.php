<?php

namespace Hanklobo\ZSCRUD\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

class ConfigController
{
    protected $configPath = '/config/landing-page.php';

    public function landingPageEdit(Request $request)
    {
        $landing = config('landing-page',[
            'blocks' => [],
        ]);
        $landing['cssUrls'] = [
            'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
            asset('landing-page.css')
        ];

        return view('zscrud::landing.editor.index', [
            'blocks' => $landing['blocks'],
            'cssUrls' => $landing['cssUrls'],
        ]);
    }

    public function landingPageUpdate(Request $request)
    {
        $validatedData = $request->validate([
            'blocks' => 'required|array',
            'blocks.header' => 'required|array',
            'blocks.header.title' => 'required|string',
            'blocks.header.links' => 'required|array',
            'blocks.hero' => 'required|array',
            'blocks.hero.title' => 'required|string',
            'blocks.hero.subtitle' => 'required|string',
            'blocks.hero.cta' => 'required|string',
            'blocks.hero.link' => 'required|string',
            'blocks.features' => 'required|array',
            'blocks.features.items' => 'required|array',
            'blocks.features.items.*.icon' => 'required|string',
            'blocks.features.items.*.title' => 'required|string',
            'blocks.features.items.*.subtitle' => 'required|string',
            'blocks.about' => 'required|array',
            'blocks.about.title' => 'required|string',
            'blocks.about.lines' => 'required|array',
            'blocks.about.image' => 'required|string',
            'blocks.testimonials' => 'required|array',
            'blocks.testimonials.title' => 'required|string',
            'blocks.testimonials.items' => 'required|array',
            'blocks.testimonials.items.*.name' => 'required|string',
            'blocks.testimonials.items.*.text' => 'required|string',
            'blocks.testimonials.items.*.position' => 'required|string',
            'blocks.testimonials.items.*.avatar' => 'required|string',
            'blocks.cta' => 'required|array',
            'blocks.cta.title' => 'required|string',
            'blocks.cta.cta' => 'required|string',
            'blocks.cta.link' => 'required|string',
        ]);

        // Processar os links para o formato correto
        $links = [];
        $linkTexts = $validatedData['blocks']['header']['links']['text'] ?? [];
        $linkUrls = $validatedData['blocks']['header']['links']['url'] ?? [];
        foreach ($linkTexts as $index => $text) {
            if (isset($linkUrls[$index])) {
                $links[$text] = $linkUrls[$index];
            }
        }
        $validatedData['blocks']['header']['links'] = $links;

        $keys = $this->prefixKey('landing-page.',$validatedData);
        foreach ($keys as $key => $val) {
            config(['landing-page.'.$key => $val]);
        }

        return redirect()->route('landing-page.edit')->with('success', 'Landing page atualizada com sucesso!');
    }

    public function landingPagePreview(Request $request)
    {
        $blocks = $request->input('blocks', []);
        $cssUrls = [
            'https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css',
            'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css',
            asset('landing-page.css')
        ];

        return view('components.landing-page-preview', compact('blocks', 'cssUrls'))->render();
    }

    public static function prefixKey($prefix, $array)
    {
        $result = array();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $result = array_merge($result, self::prefixKey($prefix . $key . '.', $value));
            } else {
                $result[$prefix . $key] = $value;
            }
        }
        return $result;
    }

    public function showConfigManager()
    {
//        $configPath = config_path('crud.php');
//        $configContent = File::exists($configPath) ? File::get($configPath) : '<?php return [];';
//        $configArray = include $configPath; // This safely includes and returns the array
//
//        return view('zscrud::config.index', [
//            'config' => $configArray,
//            'configContent' => $configContent,
//        ]);
        return view('zscrud::config.index', [
//            'config' => $configArray,
//            'configContent' => $configContent,
        ]);
    }

    public function updateConfig(Request $request)
    {
        $request->validate([
            'config_content' => 'required|string'
        ]);

        try {
            // Here we're directly writing what's sent, which is risky.
            // You should validate or sanitize the content further.
            $fileName = 'crud.php';
            $filePath = config_path($fileName);

            if (File::put($filePath, $request->input('config_content')) === false) {
                throw new \Exception('Failed to update config file.');
            }

            // Clear config cache
            Artisan::call('config:cache');

            return redirect()->route('config.manager')->with('status', 'Config updated successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['msg' => 'Failed to update config: ' . $e->getMessage()]);
        }
    }
}
