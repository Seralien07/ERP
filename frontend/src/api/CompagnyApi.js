export default class CompagnyApi {
  
  constructor (requester) {
    this.requester = requester;
  }

  /**
   * @returns {*}
  */
  getAllCompagny() {
    const url = '/api/compagny/getAll';
    return this.requester.get(url);
  }

};
