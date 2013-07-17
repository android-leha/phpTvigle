<?php

class Tvigle
{

    /**
     * @var \SoapClient
     */
    private $tvigle;

    /**
     * @param \SoapClient $tvigle
     * @param string $coverPrefix
     */
    private function __construct(\SoapClient $tvigle)
    {
        $this->tvigle = $tvigle;
    }

    /**
     * @param $videoId
     * @param $videoTitle
     * @param $videoUrl
     * @param $stopFrameUrl
     * @param $aspectRatio
     * @return mixed
     */
    public function AddRemoteVideo($videoId, $videoTitle, $videoUrl, $stopFrameUrl, $aspectRatio)
    {
        return $this->tvigle->AddRemoteVideo($videoId, $videoTitle, $videoUrl, $stopFrameUrl, $aspectRatio);
    }

    /**
     * @param int $id
     * @return object
     */
    public function VideoItem($id)
    {
        return $this->tvigle->VideoItem($id);
    }

    /**
     * @param $videoId
     * @param $videoTitle
     * @param $videoUrl
     * @param string $videoCallbackUrl
     * @param string $videoDescription
     * @param string $videoKeywords
     * @param int $categoryId
     * @param int $aspectRatio
     * @param int $hdQuality
     * @param int $fhdQuality
     * @param int $lowQuality
     * @return mixed
     */
    public function AddTask(
        $videoId,
        $videoTitle,
        $videoUrl,
        $videoCallbackUrl = '',
        $videoDescription = '',
        $videoKeywords = '',
        $categoryId = 0,
        $aspectRatio = 2,
        $hdQuality = 1500,
        $fhdQuality = 0,
        $lowQuality = 800
    ) {
        return $this->tvigle->AddTask(
            $videoId,
            $videoTitle,
            $videoUrl,
            $videoCallbackUrl,
            $videoDescription,
            $videoKeywords,
            $categoryId,
            $aspectRatio,
            $hdQuality,
            $fhdQuality,
            $lowQuality
        );
    }

    /**
     * @param $tvigleId
     * @param $frameUrl
     * @return mixed
     */
    public function AddStopCadr($tvigleId, $cadrUrl)
    {
        return $this->tvigle->AddStopCadr($tvigleId, $cadrUrl);
    }

    /**
     * @param $videoId
     * @return mixed
     */
    public function CheckState($videoId)
    {
        return $this->tvigle->CheckState($videoId);
    }

    /**
     * @param $tvigleId
     * @param $state
     * @return int
     */
    public function Active($tvigleId, $state)
    {
        return $this->tvigle->Active($tvigleId, $state);
    }

    /**
     * @param $tvigleId
     * @param int $age
     * @return int
     */
    public function age($tvigleId, $age = 0)
    {
        return $this->tvigle->age($tvigleId, $age);
    }
    
    /**
     * @return Tvigle
     */
    public static function factory($wsdl, $login, $password)
    {
        
        $planService = new \SoapClient(
            $wsdl,
            array(
                'login'    => $login,
                'password' => $password,
            )
        );
        return new Tvigle($planService);
    }
}
