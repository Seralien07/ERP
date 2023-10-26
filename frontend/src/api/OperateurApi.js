export default class OperateurApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
    getAllOperateur() {
      const url = '/api/operateur/getAll';
      return this.requester.get(url);
    }
  
  };