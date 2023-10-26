export default class VoiceApi {
  
    constructor (requester) {
      this.requester = requester;
    }
  
    /**
     * @returns {*}
    */
    getAllVoice() {
      const url = '/api/voice/getAll';
      return this.requester.get(url);
    }
  
  };
  