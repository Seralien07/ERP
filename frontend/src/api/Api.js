import Axios from 'axios';
import config from '../env.js';

import LoginApi from './LoginApi.js';
import StaffApi from './StaffApi.js';
import DepartmentApi from './DepartmentApi.js';
import CompagnyApi from './CompagnyApi.js';
import SimApi from './SimApi.js';
import OperateurApi from './OperateurApi.js';
import CredApi from './CredApi.js';
import DeviceApi from './DeviceApi.js';
import VoiceApi from './VoiceApi.js';
import OfferApi from './OfferApi.js';
import MatApi from './MatApi.js';
import CategoryApi from './CategoryApi.js';
import MatSortApi from './MatSortApi.js';
export class Api {

  constructor () {
    const axiosInstance = Axios.create({
      baseURL: config.API
    });
  
    this.loginApi = new LoginApi(axiosInstance);
    this.staffApi = new StaffApi(axiosInstance);
    this.departmentApi = new DepartmentApi(axiosInstance);
    this.compagnyApi = new CompagnyApi(axiosInstance);
    this.simApi = new SimApi(axiosInstance);
    this.operateurApi = new OperateurApi(axiosInstance);
    this.credApi = new CredApi(axiosInstance);
    this.deviceApi = new DeviceApi(axiosInstance);
    this.voiceApi = new VoiceApi(axiosInstance);
    this.offerApi = new OfferApi(axiosInstance);
    this.matApi = new MatApi(axiosInstance);
    this.categoryApi = new CategoryApi(axiosInstance);
    this.matSortApi = new MatSortApi(axiosInstance);
  };

};