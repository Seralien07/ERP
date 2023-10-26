export default class DeviceApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
    getAllDevice() {
      const url = '/api/device/getAll';
      return this.requester.get(url);
    }
  
  };
  