<?php

namespace dto;

class AbsentDto
{
    private $employeeId, $employeeName, $alpha, $sick, $permission, $leave;

    /**
     * @return mixed
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * @param mixed $employeeId
     */
    public function setEmployeeId($employeeId): void
    {
        $this->employeeId = $employeeId;
    }

    /**
     * @return mixed
     */
    public function getEmployeeName()
    {
        return $this->employeeName;
    }

    /**
     * @param mixed $employeeName
     */
    public function setEmployeeName($employeeName): void
    {
        $this->employeeName = $employeeName;
    }

    /**
     * @return mixed
     */
    public function getAlpha()
    {
        return $this->alpha;
    }

    /**
     * @param mixed $alpha
     */
    public function setAlpha($alpha): void
    {
        $this->alpha = $alpha;
    }

    /**
     * @return mixed
     */
    public function getSick()
    {
        return $this->sick;
    }

    /**
     * @param mixed $sick
     */
    public function setSick($sick): void
    {
        $this->sick = $sick;
    }

    /**
     * @return mixed
     */
    public function getPermission()
    {
        return $this->permission;
    }

    /**
     * @param mixed $permission
     */
    public function setPermission($permission): void
    {
        $this->permission = $permission;
    }

    /**
     * @return mixed
     */
    public function getLeave()
    {
        return $this->leave;
    }

    /**
     * @param mixed $leave
     */
    public function setLeave($leave): void
    {
        $this->leave = $leave;
    }

}