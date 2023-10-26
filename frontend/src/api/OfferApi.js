export default class OfferApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
    getAllOffer() {
      const url = '/api/offer/getAll';
      return this.requester.get(url);
    }
  
  };
  