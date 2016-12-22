<?php
/**
 * Copyright: (c) i2o3d Holdings Limited, 2013 - 2014
 *
 * Description: << fill in here >>
 * Project: php-gitlab-api
 * User: john
 * Date: 22/12/2016
 */

namespace Gitlab\Api;


class Services extends AbstractApi
{
    /**
     * @param       $project_id
     * @param       $service_name
     * @param array $params
     *
     * @return mixed
     */
    public function create($project_id, $service_name, $params = array())
    {
        return $this->post(
            $this->formatServicePath($project_id, $service_name),
            $params
        );
    }

    /**
     * @param $project_id
     * @param $service_name
     *
     * @return mixed
     */
    public function remove($project_id, $service_name)
    {
        return $this->delete($this->formatServicePath($project_id, $service_name));
    }

    /**
     * @param $project_id
     * @param $service_name
     *
     * @return mixed
     */
    public function read($project_id, $service_name)
    {
        return $this->get($this->formatServicePath($project_id, $service_name));
    }

    /**
     * @param $project_id
     * @param $service_name
     *
     * @return string
     */
    protected function formatServicePath($project_id, $service_name)
    {
        return 'projects/'.$this->encodePath($project_id).'/services/'.$service_name;
    }
}