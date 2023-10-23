<?php 

namespace Sempico\Api;

class ApiClient 
{
    /**
	 * domain
	 * @var string
	 */
    private string $domain = 'https://api.sempico.solutions/';

    /**
     * Make curl request
     * @param string $url
     * @param array $data
     * @param string|bool $customMethod
     * @return array
     */
    public function curlRequest(string $url, string|bool $customMethod, array $data): mixed
    {
        $output = [];
        $ch = curl_init();

        // Url
        curl_setopt($ch, CURLOPT_URL, $this->domain . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Define method and body of request
        if ($customMethod) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $customMethod);
        } 

        $output['result'] = curl_exec($ch);
        $output['http_code'] = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $output['error'] = curl_error($ch);
        curl_close($ch);
        
        return $this->handleError($output);
    }

    /**
     * Handle result for errors
     * @param array $data
     * @return array
     */
    protected function handleError(array $data): array
    {
        if (!strlen($data['error'])) {
            $data['result'] = json_decode($data['result']);
            if (isset($data['result']->error_code) && strlen($data['result']->error_code)) {
                $data['error'] = $data['result']->error;
            }
        }

        return $data;
    }
}